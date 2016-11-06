<?php
require_once "session.php";
if(isset($_GET['action'])){
	if($_GET['action'] == "add"){
		$item_id = $_GET['item_id'];
		if(isset($_COOKIE['item'])){
			$data = unserialize($_COOKIE['item']);
		}else{
			$data = array();
		}
		if(array_key_exists($item_id, $data)){
			$data[$item_id] += 1;
		}else{
			$data[$item_id] = 1;
		}
		setcookie('item', serialize($data));
	}
	if($_GET['action'] == "del"){
		$item_id = $_GET['item_id'];
		if(isset($_COOKIE['item'])){
			$data = unserialize($_COOKIE['item']);
		}else{
			$data = array();
		}
		if(array_key_exists($item_id, $data)){
			unset($data[$item_id]);
		}
		setcookie('item', serialize($data));
	}
	if($_GET['action'] == "minus"){
		$item_id = $_GET['item_id'];
		if(isset($_COOKIE['item'])){
			$data = unserialize($_COOKIE['item']);
		}else{
			$data = array();
		}
		if(array_key_exists($item_id, $data)){
			if($data[$item_id] >= 2){
				$data[$item_id] -= 1;
			}
		}
		setcookie('item', serialize($data));
	}
	header("Location: cart.php");
}
if(isset($_COOKIE['item'])){
	$data = unserialize($_COOKIE['item']);
}else{
	$data = array();
}
include "head.php";
include "category.php";
?>
<div class="cart">
		<div class="path">
			<a href="#">my account</a> > <a href="#">my shoppcart</a>
		</div>
		<div class="item_list">
<?php 
	$total = 0;
   	if (count($data)>0){
   		foreach ($data as $item_id => $number) {
   			$item = ItemDao::getItemById($item_id);
   			$total += $item->item_price * $number;
   			print("<ul class='item_div' item_id='".$item->item_id."'>");
			print("<li class='item_img'><img src='".$item->img."'</li>");
			print("<li class='item_title'><a href='item.php?item_id=".$item->item_id."'>".$item->item_name."</a><br /></li>");
			print("<li class='unit_price'><span class='price'>".$item->item_price."</span></li>");
			print("<li class='cart_number'>");
			print("<div data-trigger='spinner' class='number_spinner'>");
			print("<a href='cart.php?action=minus&item_id=".$item->item_id."' class='btn btn-default' data-spin='down'>-</a>");
			print("<input class='unit_number' type='text' value='".$number."' data-rule='quantity' />");
			print("<a href='cart.php?action=add&item_id=".$item->item_id."' class='btn btn-default' data-spin='up'>+</a>");
			print("</div>");
			print("</li>");
			print("<li class='total_price'>$".$item->item_price * $number."</li>");
			print("<li class='delete_btn'>");
			print("<a href='cart.php?action=del&item_id=".$item->item_id."'>");
			print("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>");
			print("</a></li></ul>");
   		}
   		print("<div class='order_price'>");
        print("GST: <span class='gst'> $".$total * 0.15."</span>  ");
		print("total price: <span class='price'> $".$total." </span></div>");
   	}
?>
			
	        
			<div class="clearout">
				<a href="clearcart.php" class="btn btn-info">Clear out</a>
			</div>
			<div class="checkout">
			 	<a href="checkout.php" class="btn btn-danger">Check out</a>
			</div>
	        
		</div>
	</div>
<?php
	include "bottom.php";
?>
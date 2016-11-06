<?php
require_once "session.php";
if(isset($_SESSION['customer'])){
	$customer = unserialize(base64_decode($_SESSION['customer']));
	$customer_id = $customer->customer_id;
	$o = new Order();
	$o->grandtotal = 0;
	$o->customer_id=$customer_id;
	$items = array();
	if(isset($_COOKIE['item'])){
		$data = unserialize($_COOKIE['item']);
		foreach ($data as $item_id => $number) {
			$item = ItemDao::getItemById($item_id);
			$items[] = $item;
			$o->grandtotal += $item->item_price * $number; 
		}
		$order_id = OrderDao::add($o);
		foreach ($items as $item) {
			$od = new OrderDetail();
			$od->order_id=$order_id;
			$od->item_id=$item->item_id;
			$od->number=$data[$item->item_id];
			$od->price=$item->item_price;
			$od->discount = 1;
			$od->grandtotal = $od->price * $od->number * $od->discount;
			OrderDetailDao::add($od);
		}
		
		header("Location: order.php?order_id=".$order_id);
	}else{
		header("Location: cart.php");
	}
}else{
	header("Location: login.php");
}

unset($_COOKIE['item']);
include "head.php";
include "category.php";
?>

<?php
	include "bottom.php";
?>
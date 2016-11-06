<?php
require_once "session.php";
if(!isset($_SESSION['customer'])){
	header("Location: login.php");
}
$customer = unserialize(base64_decode($_SESSION['customer']));
$customer_id = $customer->customer_id;
$order = OrderDao::getOrderById($_GET['order_id'],$customer_id);
include "head.php";
include "category.php";
?>
<div class="order">
	<div class="path">
		<a href="#">my account</a> > <a href="#">my order list</a>
	</div>
    <?php
        $status = "waiting";
        if ($order->order_status == 1)
        {
            $status = "shipped";
        }
    ?>
	<ul class="order_head">
		<?php 
		print("<li>".$order->ctime."</li>");
		print("<li>code : ".$order->order_id."</li>");
		print("<li>status :<span class='price'>".$status."</span></li>");
		print("<li>grandtotal : <span class='price'>$".$order->grandtotal."</span></li>");
        print("<li>subtotal : <span class='price'>$".$order->grandtotal * 0.85."</span></li>");
        print("<li>GST : <span class='price'>$".$order->grandtotal*0.15."</span></li>");
        ?>
	</ul>
	<div class="item_list">
		<?php 
		$ods = OrderDetailDao::getOrderDetailsByOrderId($order->order_id);
		foreach ($ods as $od) {
			$item = ItemDao::GetItemById($od->item_id);
			print("<ul class='item_div'>");
			print("<li class='item_img'><img src='".$item->img."'	title='".$item->item_name."' /></li>");
			print("<li class='item_title'>".$item->item_name."</li>");
			print("<li class='unit_price'><span class='price'>".$od->price."</span></li>");
			print("<li class='number'>X".$od->number."</li>");
			print("<li class='number'>".((1-$od->discount)*100)."% off</li>");
			print("<li class='total_price'><span class='price'>$".$od->price*$od->number*$od->discount."</span></li>");
			print("</ul>");
		}
		 ?>
	</div>
</div>
<?php
	include "bottom.php";
?>
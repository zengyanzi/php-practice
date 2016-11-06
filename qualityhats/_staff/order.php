<?php 
include "head.php";

if(isset($_GET['action']) && $_GET['action']=="ship"){
	$order_id = $_GET['order_id'];
	OrderDao::modifyStatus($order_id,1);
	header("Location: order.php");
}
$status=0;
if(isset($_GET['status'])){
	$status=$_GET['status'];
}
$order_list = OrderDao::getOrderByStatus($status);
?>
<div class="condition">
    <select id="order_status" name="order_status">
    	<?php
    	if($status==0){
	        print("<option value='0' selected='selected'>waiting</option>");
	        print("<option value='1'>shipped</option>");
	    }else{
	    	print("<option value='0'>waiting</option>");
	        print("<option value='1' selected='selected'>shipped</option>");
	    }
        ?>
    </select>
    <a class="btn btn-default" id="search_btn">filter</a>
</div>
<script>
    $("#search_btn").click(function () {
        var status = $("#order_status").val();
        window.location.href = "order.php?status=" + status;
    });
</script>
<div class="list">
<?php
foreach ($order_list as $o) {
	print("<ul>");
	$s = $o->order_status == 0 ? "waiting" : "shipped";
	$customer_name = CustomerDao::getCustomerById($o->customer_id)->customer_name;
	print("<li class='customer_name'>".$customer_name."</li>");
    print("<li class='customer_email'><a href='../order.php?order_id=".$o->order_id."'>order_detail</a></li>");
    print("<li class='customer_email'>$".$o->grandtotal."</li>");
    print("<li class='customer_phone'>".$s."</li>");
    print("<li class='customer_op'><a href='order.php?action=ship&order_id=".$o->order_id."'>ship</a></li>");
	print("</ul>");
}
?>
<?php
include "bottom.php";
?>
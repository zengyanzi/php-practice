<?php 
include "head.php";
if(isset($_GET['search'])){
	$search=$_GET['search'];
	$cs = CustomerDao::search($search);
}else{
	$cs = CustomerDao::getCustomers();
}
?>
<div class="condition">
    <input id="customer_name" type="text" />
    <a class="btn btn-default" id="search_btn">search</a>
</div>
<script>
    $("#search_btn").click(function () {
        var search = $("#customer_name").val();
        window.location.href = "customer.php?search=" + search;
    });
</script>
<div class="list">
<?php 
foreach ($cs as $c){
	print("<ul>");
	$status = $c->status==0?"active":"disabled";
    print("<li class='customer_name'>".$c->customer_name."</li>");
    print("<li class='customer_email'>".$c->email."</li>");
    print("<li class='customer_phone'>".$c->phone."</li>");
    print("<li class='customer_phone'>".$status."</li>");
    
} 
?>
	
<?php 
include "bottom.php";
?>
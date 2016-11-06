<?php 
include "head.php";
if(isset($_GET['action']) && $_GET['action']=="add"){
	$supplier_name=$_GET['supplier_name'];
	$supplier_description=$_GET['supplier_description'];
	$supplier = new Supplier();
	$supplier->supplier_description=$supplier_description;
	$supplier->supplier_name=$supplier_name;
	$supplier->supplier_status=0;
	SupplierDao::add($supplier);
	header("Location: supplier.php");
}

$ss = SupplierDao::getSupplier();


 ?>
<ul id="add_supplier">
    <li><input type="text" id="supplier_name" /></li>
    <li><input type="text" id="supplier_description" /></li>
    <li><a id="btn_add" class="btn btn-default">add supplier</a></li>
</ul>
<script>
    $("#btn_add").click(function () {
        var sname = $("#supplier_name").val();
        var sdesc = $("#supplier_description").val();
        window.location.href = "supplier.php?action=add&supplier_name=" + sname + "&supplier_description=" + sdesc;
    });
</script>
<div class="list">
	<?php 
	foreach ($ss as $s) {
		print("<ul>");
		$status = $s->supplier_status==0?"active":"disabled";
		print("<li class='customer_name'>".$s->supplier_name."</li>");
		print("<li class='customer_email'>".$s->supplier_description."</li>");
		print("<li class='customer_email'>".$status."</li>");
		print("</ul>");
	}
	 ?>

</div>
 <?php 
include "bottom.php";
  ?>
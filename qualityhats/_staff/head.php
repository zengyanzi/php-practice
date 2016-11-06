
<?php 
include "../session.php";
if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true){
	header("Location: login.php");
}
 ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>Admin Center</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="css/admingeneral.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
<!-- 3，加载bootstrap核心Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
		<div id="menu_left">
			<ul>
				<li><a href="category.php">Category</a></li>
				<li><a href="item.php">Item</a></li>
				<li><a href="customer.php">Customer</a></li>
				<li><a href="supplier.php">Supplier</a></li>
				<li><a href="order.php">Order</a></li>
			</ul>
		</div>
    <div id="content_right">

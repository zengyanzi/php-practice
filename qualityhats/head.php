<!DOCTYPE html>
<html>
<head>
<title>Quality Hats</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<title>Quility Hats</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/general.css" rel="stylesheet">
<link href="css/register.css" rel="stylesheet">

<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="js/jquery.js"></script>
<!-- 3，加载bootstrap核心Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div id="header" class="container">
			<div id="top">
				<ul id="linkers">
					<li><a href="index.php">home</a></li>
					<li>|</li>
<?php
if(!array_key_exists('customer',$_SESSION)){
	print("<li><a href='login.php'>login</a></li>");
	print("<li>|</li>");
	print("<li><a href='register.php'>register</a></li>");
}else{
	$customer = unserialize(base64_decode($_SESSION['customer']));
	print("<li>welcome : <a href='login.php'>".$customer->customer_name."</a></li>");
	print("<li>|</li>");
	print("<li><a href='logout.php'>logout</a></li>");
}
?>
					
					<li>|</li>
					<li><a href="contactus.php">contact us</a></li>
					<li>|</li>
					<li><a href="cart.php">shopcart</a></li>
				</ul>
			</div>
			<div id="logo">
				<a href="index.html" title="home page"><img id="logo_img"
					src="pic/logo.png" /></a>
			</div>
		</div>
		<div id="menu_bar">
			<div id="menus" class="container">
				<div id="cats">
					category<span class="caret"></span>
				</div>
				<ul id="menu">
					<li><a href="#">Home</a></li>
					<li><a href="#">New Hats</a></li>
					<li><a href="#">Special Offers</a></li>
					<li><a href="#">All Items</a></li>
				</ul>
			</div>
		</div>
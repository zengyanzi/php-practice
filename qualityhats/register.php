<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// register logic
	// $_REQUEST['userpassword']
	// ...
	// 判断数据的合法
	// ...
	require_once('class/customer.php');
	require_once('dao/customer_dao.php');
	$customer = new Customer();
	$customer->name = $_POST['name'];
	$customer->password = $_POST['userpassword'];
	$customer->phone = $_POST['phone'];
	$customer->email = $_POST['email'];
	$customer->status = 0;
	CustomerDao::add($customer);
	header("Location: login.php"); 
}else{
	include "head.php";
	include "category.php";
}
?>
<div class="sign">
	<h5>register</h5>
	<form class="registerform" id="form_sign" method="POST">
		<ul>
			<li><lable class="need"> * </lable> <lable
					style="width:80px;" id="aaa"> name： </lable> <input type="text"
				value="" name="name" class="inputxt" datatype="s4-20"
				nullmsg="required" errormsg="must be 4-20 characters" /> <lable
					class="Validform_checktip"> must be 4-20 characters </lable></li>
			<li><lable class="need"> * </lable> <lable
					style="width:80px;" id="aaa"> password： </lable> <input
				type="password" value="" name="userpassword" class="inputxt"
				datatype="*6-20" errormsg="must be 6-20 characters" /> <lable
					class="Validform_checktip"> must be 6-20 characters </lable></li>
			<li><lable class="need"> * </lable> <lable
					style="width:80px;" id="aaa"> repeat password： </lable> <input
				type="password" value="" name="userpassword2" datatype="*"
				class="inputxt" recheck="userpassword"
				errormsg="two passwords are not same" /> <lable
					class="Validform_checktip"> repeat </lable></li>
			<li><lable class="need"> * </lable> <lable
					style="width:80px;" id="aaa"> mobile </lable> <input type="text"
				value="" name="phone" class="inputxt" datatype="m" /> <lable
					class="Validform_checktip"> required</lable>
			<li><lable class="need"> * </lable> <lable
					style="width:80px;" id="aaa"> email </lable> <input type="text"
				value="" name="email" class="inputxt" datatype="m" /> <lable
					class="Validform_checktip"> required</lable>
			
			<li><input type="submit" value="rigster" class="zhuce"></li>
		</ul>
	</form>
</div>
<?php
	include "bottom.php";
?>
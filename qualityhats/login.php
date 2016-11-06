<?php
require_once "session.php";
if(array_key_exists('customer',$_SESSION)){
	header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once('class/customer.php');
	require_once('dao/customer_dao.php');
	$name = $_POST['name'];
	$password = $_POST['userpassword'];
	$customer = CustomerDao::login($name,$password);
	if(is_null($customer)){
		print("<script>alert('can not login');</script>");
	}else{
		$_SESSION['customer'] = base64_encode(serialize($customer)); 
		header("Location: index.php"); 
	}
}else{
	include "head.php";
	include "category.php";
}
?>
<div class="sign">
	<h5>login</h5>
	<form id="registerform" id="form_sign" method="POST">
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
				<li><input type="submit" value="rigster" class="zhuce"></li>
		</ul>
	</form>
</div>
<?php
	include "bottom.php";
?>
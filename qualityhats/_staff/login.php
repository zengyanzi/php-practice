<?php

include "../session.php";

if(isset($_POST['name']) && isset($_POST['password'])){
	if($_POST['name'] == 'admin' && $_POST['password'] == 'adminadmin'){
		$_SESSION['admin'] = true;
		header("Location: index.php");
	}
}

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>admin_login</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="css/admingeneral.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
</head>
<body>
<div class="adminlogin">
    <h2>login</h2>
	<form id="form_login" method='post'>
		<ul id="loginbox">
			<li>
                <input type='text' id='name' name='name' class='inputtxt'/>
			</li>
			<li>
				<input type='password' id='password' name='password' class='inputtxt'/>
			</li>
			<li>
				<input type='submit' class="btn btn-default"/>
            </li>
		</ul>
	</form>
</div>
</body>
</html>
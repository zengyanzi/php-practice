<?php
header('content=type:text/html;chartset=utf8_d');
// $username=$_POST['username'];
$username=$_GET['username'];
if ($username=='admin') {
	echo ' false';
} else{
	echo 'true';
}
?>
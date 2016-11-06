<?php
require_once('config.php');
//connent database
if(!($conn=mysqli_connect(HOST,USERNAME,PASSWORD))){
	echo mysql_error();
}
//select database
if(!(mysqli_select_db($conn,'info'))){
	echo mysql_error();
}
//
if(!(mysqli_query($conn,'set names utfs'))){
	echo mysql_error();
}
?>

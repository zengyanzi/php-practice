<?php
	require_once('../connect.php');
	$id=$_GET['id'];
	$deletesql="delete from article where id='$id'";
	if ($mysqli->query($deletesql)) {
		echo "<script>alert('delete文章成功');window.location.href='article.manage.php';</script>";
	}else{
		echo "<script>alert('delete失败');</script>";
		}

?>
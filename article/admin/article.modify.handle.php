<?php
	require_once('../config.php');
	//print_r($_POST);
	if (!(isset($_POST['title'])&&(!empty($_POST['title'])))) {
		echo "<script>alert('title cannot empty');window.location.href='article.add.php';</script>";
	}

	$id=$_POST['id'];
	$title=$_POST['title'];
	$author=$_POST['author'];
	$description=$_POST['description'];
	$content=$_POST['content'];
	$dateline=time();
	$updatetsql="update article set title='$title',author='$author',description='$description',content='$content',$dateline where id=$id";
	// if (mysqli_query($insertsql)) {
	// 	echo "<script>alert('publish article');window.location.href='article.manage.php';</script>";
	// }else{
	// 	echo"fail";
	// }
	// echo "$insertsql";
	//
	// echo "$selectsql";
	// $mysqli=new mysqli("localhost","root","","info");
	if ($mysqli->connect_errno) {
		echo"fail";
	}
	if ($mysqli->query($updatetsql)) {
		echo "<script>alert('modify文章成功');window.location.href='article.manage.php';</script>";
	}else{
		echo "<script>alert('modify失败');</script>";
		}
	// $selectsql="select * from article";
	// $res=$mysqli->query($selectsql);
	// if ($res->num_rows>0) {
	// 	$rows=$res->fetch_assoc();
	// 	$title=$rows["title"];
	// 	echo "$title";
	// }
	// if(mysql_query($insertsql)){
	// 	echo "<script>alert('发布文章成功');window.location.href='article.manage.php';</script>";
	// }else{
	// 	echo "<script>alert('发布失败');</script>";
	// }
?>
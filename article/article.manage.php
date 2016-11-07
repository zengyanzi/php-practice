<?php
require_once('../connect.php');
$sql="select * from article order by dateline desc";
$res=$mysqli->query($sql);
if ($res&&mysqli_num_rows($res)) {
	while ($row=$res->fetch_assoc()) {
		$data[]=$row;
	}
}else{
	$data=array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
	</style>
</head>
<body>
	<table width="100%" height="520" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
		<tr>
			<td height="89" colspan="2" bgcolor="#ffff99">
				<strong>
					management system
				</strong>
			</td>
		</tr>
		<tr>
			<td width="156" height="287" align="left" valign="top" bgcolor="#ffff99"><p><a href="article.add.php">publish article</a></p>
			<p><a href="article.manage.php">manage article</a></p></td>
			<td width="837" valign="top" bgcolor="#ffffff"><table width="743" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
				<tr>
					<td colspan="3" align="center" bgcolor="#ffffff">article list</td>
				</tr>
			<tr>
				<td width="37" bgcolor="#ffffff">id</td>
				<td width="572" bgcolor="#ffffff">title</td>
				<td width="82" bgcolor="#ffffff">action</td>
			</tr>
			<?php
			if (!empty($data)) {
				foreach ($data as $value) {
			?>
			<tr>
				<td bgcolor="#FFFFFF">&nbsp;<?php echo $value['id']?></td>
				<td bgcolor="#FFFFFF">&nbsp;<?php echo $value['title']?></td>
				<td bgcolor="#FFFFFF"><a href="article.del.handle.php?id=<?php echo $value['id'] ?>">delelte</a><a href="article.modify.php?id=<?php echo $value['id'] ?>">modify</a></td>
			</tr>		
				<?php
						}
			}
			?>
		
			</table>
				
			</td>
		</tr>
		<tr>
			<td colspan="2" bgcolor="#ffff99"><strong> copyright</strong></td>
		</tr>
	</table>
	
</body>
</html>
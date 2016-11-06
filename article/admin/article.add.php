<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	body{
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
			<td height="89" colspan="2" bgcolor="#ffff99"><strong>Backendmanagement</strong>
			</td>
		</tr>
		<tr>
			<td width="156" height="287" align="left" valign="top" bgcolor="#ffff99"><p><a href="article.add.php">publish article</a></p
			<p><a href="article.manage.php">manage article</a></p>
			<a href="article.add.php"></a></td>
			<td width="837" valign="top" bgcolor="#ffffff">
				<form id="form1" name="form1" method="post" action="article.add.handle.php">
					<table width="779" border="0" cellpadding="8" cellspacing="1">
						<tr>
							<td colspan="2" align="center">publish article</td>
						</tr>
						<tr>
							<td width="119">title</td>
							<td width="625"><label for="title"></label>
								<input type="text" name="title" id="titel"></td>
						</tr>
						<tr>
							<td>author</td>
							<td><input type="text" name="author" id="author"></td>
						</tr>
						<tr>
							<td>brief introduction</td>
							<td><label for="description"></label>
								<textarea name="description" id="descripiton" cols="60" rows="5"></textarea></td>
						</tr>
						<tr>
							<td>content</td>
							<td><textarea name="content" cols="60" rows="15" id="content"></textarea></td>
						</tr>
						<tr>
							<td colspan="2" align="right"><input type="submit" value="submit" name="button" id="button"></td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
		<tr>
			<td colspan="2" bgcolor="#ffff99"><strong>copyright</strong></td>
		</tr>
	</table>
</body>
</html>
<?php
define('IN_TG',true);
require dirname(__FILE__).'\includes\common.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<title>多用户留言系统--注册</title>
	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href=styles/1/basic.css />
	<link rel="stylesheet" type="text/css" href=styles/1/register.css />
</head>
<body>
<?php 
	require ROOT_PATH.'includes/header.inc.php';
?>
<div id="register">
	<h2>Member login</h2>
	<form method="post" action="post.php">
		<dl>
		<dt>Please fill in the table carefully</dt>
		<dd>user &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; name: <input type="text" name="userName" class="text"/></dd>
		<dd>password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="password" name="passWord" class="text"/></dd>
		<dd>confirm password: <input type="password" name="confirmPassword" class="text"/></dd>
		<dd>security questions: <input type="text" name="questions" class="text"/></dd>
		<dd>security answers &nbsp;: <input type="text" name="answers" class="text"/></dd>
		<dd>sex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="radio" name="sex" value="male" checked="checked"/>male&nbsp;&nbsp;<input type="radio" name="sex" value="female" />female</dd>
		<dd class="picture"><img alt="profile picture" src="face/m01.gif" onclick="javascript:window.open('picture.php','picture','width=400,height=400,top=0,left=0')"/></dd>
		<dd>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="email" class="text"/></dd>
		<dd>QQ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="qq" class="text"/></dd>
		<dd>personal website&nbsp;: <input type="text" name="url" class="text" value="http://"/></dd>
		<dd>security code &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="securityCode" class="text securityCode" /></dd>
		<dd><input type="submit" class="submit" value="register"/></dd>
		</dl>
	</form>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
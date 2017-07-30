<?php 
	define('IN_TG',true);
	
	require dirname(__FILE__).'\includes\common.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<title>多用户留言系统--首页</title>
	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href=styles/1/basic.css />
	<link rel="stylesheet" type="text/css" href=styles/1/index.css />
</head>
<body>
<?php 
	require ROOT_PATH.'includes/header.inc.php';
?>
<div id="list">
	<h2>帖子列表</h2>
</div>

<div id="user">
	<h2>新进会员</h2>
</div>

<div id="pics">
	<h2>最新图片</h2>
</div>

<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
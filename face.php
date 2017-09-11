<?php
//���峣����������Ȩ����includes������ļ�
define('IN_TG',true);
//���峣���������ƶ���ҳ������
define('SCRIPT', 'face');
//���빫���ļ�
require dirname(__FILE__).'\includes\common.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<title>Choose Picture</title>
<?php 
require ROOT_PATH.'includes/title.inc.php';
?>
</head>
<body>
<div id="face">
	<h3>Choose Your Picture</h3>
	<dl>
	<?php foreach(range(1,9) as $num){?>
	<dd><img src="face/m0<?php echo $num?>.gif" alt="Picture<?php echo $num?>"/></dd>
	<?php }?>
	</dl>
	
	<dl>
	<?php foreach(range(10,64) as $num){?>
	<dd><img src="face/m<?php echo $num?>.gif" alt="Picture<?php echo $num?>"/></dd>
	<?php }?>
	</dl>
</div>
</body>
</html>
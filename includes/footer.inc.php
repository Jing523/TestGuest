<?php 
	if(!defined('IN_TG')) {
		exit('Access Denied!');
	}
	
	$endTime = runTime();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<div id="footer">
	<p>������ִ�к�ʱΪ��<?php echo $endTime - $GLOBALS['startTime']?>��</p>
	<p>��Ȩ���� ����ؾ�</p>
	<p>��������<span>ư��Web���ֲ�</span>�ṩ Դ������������޸Ļ򷢲���c��yc60.com</p>
</div>
</html>
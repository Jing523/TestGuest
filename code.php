<?php 
session_start();
$randCode = 4;
for ($i=0;$i<4;$i++) {
	$nmsg .= dechex(mt_rand(0,15));
}

$_SESSION['code'] = $nmsg;
//���͸�
$width = 75;
$height = 25;
//����һ��ͼ��
$img = imagecreatetruecolor($width, $height);
//Ϊһ��ͼ�������ɫ
$white = imagecolorallocate($img, 255, 255, 255);
//�������
imagefill($img,0,0,$white);
//���ƺ�ɫ�߿�
// $black = imagecolorallocate($img, 0, 0,0);
// imagerectangle($img, 0, 0, $width-1, $height-1, $black);
//���������������
for ($i=0;$i<6;$i++) {
	$randColor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	imageline($img, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $randColor);
}
//���ѩ��
for($i=0;$i<100;$i++) {
	$randColor = imagecolorallocate($img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
	imagestring($img, 1, mt_rand(1,$width), mt_rand(1,$height), "*", $randColor);
}
for ($i=0;$i<strlen($_SESSION['code']);$i++) {
	imagestring($img, 5, $i*$width/$randCode+ mt_rand(1,10), 
			mt_rand(1,$height/2), $_SESSION['code'][$i], 
			imagecolorallocate($img, mt_rand(0,100), mt_rand(0,150), mt_rand(0,200)));
} 
//���ͼ��
header('Content-Type:image/png');
imagepng($img);

imagedestroy($img);
?>
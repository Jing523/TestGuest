<?php 
function runTime() {
	$mTime = explode(' ', microtime());
	return ($mTime[0] + $mTime[1]); 
}
/**
 *code()是验证码函数
 *@access public
 *@param int$width表示验证码的长度
 *@param int$height表示验证码的高度
 *@parma int$randCode表示验证码的个数
 *@param bool $flag表示验证码是否需要边框
 *@return void这个函数执行后产生一个验证码
 */
function code($width=75,$height=25,$randCode=4,$flag=false) {
	//产生随机码
	for ($i=0;$i<$randCode;$i++) {
		$nmsg .= dechex(mt_rand(0,15));
	}
	
	$_SESSION['code'] = $nmsg;
 
	//创建一张图像
	$img = imagecreatetruecolor($width, $height);
	//为一幅图像分配颜色
	$white = imagecolorallocate($img, 255, 255, 255);
	//区域填充
	imagefill($img,0,0,$white);
	//绘制黑色边框
	if ($flag) {
		$black = imagecolorallocate($img, 0, 0,0);
		imagerectangle($img, 0, 0, $width-1, $height-1, $black);
	}
	//随机画出六根线条
	for ($i=0;$i<6;$i++) {
		$randColor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
		imageline($img, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $randColor);
	}
	//随机雪花
	for($i=0;$i<100;$i++) {
		$randColor = imagecolorallocate($img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
		imagestring($img, 1, mt_rand(1,$width), mt_rand(1,$height), "*", $randColor);
	}
	//输出验证码
	for ($i=0;$i<strlen($_SESSION['code']);$i++) {
		imagestring($img, 5, $i*$width/$randCode+ mt_rand(1,10),
				mt_rand(1,$height/2), $_SESSION['code'][$i],
				imagecolorallocate($img, mt_rand(0,100), mt_rand(0,150), mt_rand(0,200)));
	}
	//输出图像
	header('Content-Type:image/png');
	imagepng($img);
	
	imagedestroy($img);
}
?>

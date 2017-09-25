<?php
function runTime() {
    $mTime = explode(' ', microtime());
    return ($mTime[0] + $mTime[1]);
}
function alert_back($info) {
    echo "<script type='text/javascript'>alert('$info');history.back();</script>";
    exit();
}

function location($info, $url) {
    echo "<script type='text/javascript'>alert('$info');location.href='$url';</script>";
}
function sha1Uniqid() {
    return sha1(uniqid(rand(),true));
}

function checkSecurityCode($inputCode, $securityCode) {
    if ($inputCode != $securityCode) {
        alert_back('Security code is wrong.');
    }
}
/**
 *@access public
 *@param int $width the length of code
 *@param int $height the height of code
 *@parma int $randCode the number of code
 *@param bool $flag code with frame or not
 *@return void produce a code
 */
function code($width=75,$height=25,$randCode=4,$flag=false) {
    $nmsg = null;
    //produce random number
    for ($i=0;$i<$randCode;$i++) {
        $nmsg .= dechex(mt_rand(0,15));
    }

    $_SESSION['securityCode'] = $nmsg;

    //create a new true color image
    $img = imagecreatetruecolor($width, $height);
    //allocate a color for an image
    $white = imagecolorallocate($img, 255, 255, 255);
    //flood fill
    imagefill($img,0,0,$white);
    //create black frame
    if ($flag) {
        $black = imagecolorallocate($img, 0, 0,0);
        imagerectangle($img, 0, 0, $width-1, $height-1, $black);
    }
    //create six lines randomly
    for ($i=0;$i<6;$i++) {
        $randColor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
        imageline($img, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $randColor);
    }
    //create snowflake randomly
    for($i=0;$i<100;$i++) {
        $randColor = imagecolorallocate($img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
        imagestring($img, 1, mt_rand(1,$width), mt_rand(1,$height), "*", $randColor);
    }
    //output verification code
    for ($i=0;$i<strlen($_SESSION['securityCode']);$i++) {
        imagestring($img, 5, $i*$width/$randCode+ mt_rand(1,10),
            mt_rand(1,$height/2), $_SESSION['securityCode'][$i],
            imagecolorallocate($img, mt_rand(0,100), mt_rand(0,150), mt_rand(0,200)));
    }
    //output an image
    header('Content-Type:image/png');
    imagepng($img);

    imagedestroy($img);
}
?>

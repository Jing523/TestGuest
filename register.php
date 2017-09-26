<?php
session_start();
define('IN_TG',true);
define('SCRIPT','register');
require dirname(__FILE__).'\includes\common.inc.php';
if($_GET['action'] == 'register') {
    checkSecurityCode($_POST['securityCode'], $_SESSION['securityCode']);
	//include verification file
    include ROOT_PATH.'includes/register.func.php';
	//define a null array which is used to save submitted legal data 
	$clean = array();
	$clean['uniqid'] = checkUniqid($_POST['uniqid'], $_SESSION['uniqid']);
	$clean['active'] = sha1Uniqid();
	$clean['userName'] = checkUsername($_POST['userName'],2,20);
	$clean['password'] = checkPassword($_POST['passWord'],$_POST['confirmPassword'],6);
	$clean['question'] = checkQuestion($_POST['question'], 2, 40);
	$clean['answer'] = checkAnswer($_POST['question'], $_POST['answer'], 2, 40);
    $clean['sex'] = checkSex(checkSex($_POST['sex']));
    $clean['picture'] = checkPicture($_POST['picture']);
	$clean['email'] = checkEmail($_POST['email'], 6, 40);
	$clean['qq'] = checkNumber($_POST['qq']);
	$clean['url'] = checkUrl($_POST['url'], 40);

    isRepeat($mysqli, "SELECT tg_username FROM tg_user WHERE tg_username='{$clean['userName']}' LIMIT 1",
        'Sorry, this username has already been registered, please try again');

	queryDatabase($mysqli,
	            "INSERT INTO tg_user (
                                            tg_uniqid,
                                            tg_active,
                                            tg_username,
                                            tg_password,
                                            tg_question,
                                            tg_answer,
                                            tg_email,
                                            tg_qq_number,
                                            tg_url,
                                            tg_sex,
                                            tg_face,
                                            tg_reg_time,
                                            tg_last_login_time,
                                            tg_last_login_ip
                                            )
                                    VALUES (
                                            '{$clean['uniqid']}',
                                            '{$clean['active']}',
                                            '{$clean['userName']}',
                                            '{$clean['password']}',
                                            '{$clean['question']}',
                                            '{$clean['answer']}',
                                            '{$clean['email']}',
                                            '{$clean['qq']}',
                                            '{$clean['url']}',
                                            '{$clean['sex']}',
                                            '{$clean['picture']}',
                                            NOW(),
                                            NOW(),
                                            '{$_SERVER['REMOTE_ADDR']}'
                                            
                                    )"

    );
//    $mysqli->close();
    closeDatabase($mysqli);
    location('Congratulations， register successfully.', 'index.php');
} else {
    $_SESSION['uniqid'] = $uniqid = sha1Uniqid();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<title>Multi_user Message System--Home Page</title>
<?php 
require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
<?php 
	require ROOT_PATH.'includes/header.inc.php';
?>
<div id="register">
	<h2>Member login</h2>
	<form method="post" name="register" action="register.php?action=register">
        <input type="hidden" name="uniqid" value="<?php echo $uniqid ?>"/>
		<dl>
		<dt>Please fill in the table carefully</dt>
		<dd>user &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; name: <input type="text" name="userName" class="text"/></dd>
		<dd>password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="password" name="passWord" class="text"/></dd>
		<dd>confirm password: <input type="password" name="confirmPassword" class="text"/></dd>
		<dd>security questions: <input type="text" name="question" class="text"/></dd>
		<dd>security answers &nbsp;: <input type="text" name="answer" class="text"/></dd>
		<dd>sex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="radio" name="sex" value="male" checked="checked"/>male&nbsp;&nbsp;<input type="radio" name="sex" value="female" />female</dd>
		<dd class="picture"><input type="hidden" name="face" value="face/m01" /><img alt="profile picture" src="face/m01.gif" id="faceimg"/></dd>
		<dd>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="email" class="text"/></dd>
		<dd>QQ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="qq" class="text"/></dd>
		<dd>personal website&nbsp;: <input type="text" name="url" class="text" value="http://"/></dd>
		<dd>security code &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="securityCode" class="text securityCode" /><img src="code.php" id="code" /></dd>
		<dd><input type="submit" class="submit" value="register"/></dd>
		</dl>
	</form>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
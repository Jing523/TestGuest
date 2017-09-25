<?php
 if(!defined('IN_TG')) {
     exit('Access Denied!');
 }

 define('ROOT_PATH',substr(dirname(__FILE__),0,-8));

 if(PHP_VERSION < '5.1.0') {
     exit('PHP Version is out of date!');
 }

 require ROOT_PATH.'includes\global.func.php';

 define('START_TIME', runTime());
// $GLOBALS['startTime'] = runTime();

//connect to database
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','rootroot');
define('DB_NAME','test_guest');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ')' .$mysqli->connect_error);

}

if (!$mysqli->select_db(DB_NAME)) {
    die(DB_NAME.' is not existing.');
}

?>

<?php
 if(!defined('IN_TG')) {
     exit('Access Denied!');
 }

 define('ROOT_PATH',substr(dirname(__FILE__),0,-8));

 if(PHP_VERSION < '5.1.0') {
     exit('PHP Version is out of date!');
 }

 require ROOT_PATH.'includes\global.func.php';
 $GLOBALS['startTime'] = runTime();
 ?>

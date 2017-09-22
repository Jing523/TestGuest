<?php 
session_start();
//定义常量，用来授权调用includes里面的文件
define('IN_TG',true);
//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';
//验证码大小为：75*25，默认位数是4位，如果位数是6位 长度推荐125，如果位数是8位，长度推荐175
//第四个参数是是否要边框
code(75,25,4,true);
?> 
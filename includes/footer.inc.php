<?php
if(!defined('IN_TG')) {
    exit('Access Denied!');
}

closeDatabase($mysqli);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<div id="footer">
    <p>The program's running time is <?php echo runTime() - START_TIME?>seconds</p>
    <p>All right reserved</p>
    <p>This program is released by <span>Jing Wang.</span>The source code can be modified or released as you like</p>
</div>
</html>
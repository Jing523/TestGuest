<?php 
function runTime() {
	$mTime = explode(' ', microtime());
	return ($mTime[0] + $mTime[1]); 
}
?>

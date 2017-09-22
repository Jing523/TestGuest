<?php
/**
 * Created by PhpStorm.
 * User: Jing Wang
 * Date: 2017/9/19
 * Time: 15:21
 */

if (!defined('IN_TG')) {
    exit('Access Defined!');
}

if (!function_exists('alert_back')) {
    exit('alert_back() does not exist!');
}
/**
 * @access public
 * check and filter username
 * @param string $string
 * @param int $maxLen
 * @param int $minLen
 * @return string filtered username
 */
function checkUsername($string, $minLen, $maxLen)
{
    //strip whitespace(or other characters) from the beginning and the end of the string
    $string = trim($string);

    if (strlen($string) < $minLen || strlen($string > $maxLen)) {
        alert_back('The length of username should be more than '.$minLen.' and less than '.$maxLen.'!');
    }

    $pattern = '/[<>\'\"]/';
    if (preg_match($pattern, $string)) {
        alert_back('username cannot contain special characters!');
    }

    $specialUsername[0] = 'Jing Wang';
    $specialUsername[1] = 'Gen Liu';
    $specialUsernames = null;
    foreach($specialUsername as $value) {
        $specialUsernames .= $value.'\n';
    }

    if (in_array($string, $specialUsername)) {
        alert_back($specialUsernames.'The above special usernames cannot be registered!');
    }
    return $string;
}
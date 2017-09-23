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
 * check username to determine if it is legal
 * @access public
 * @param string $string
 * @param int $maxLen
 * @param int $minLen
 * @return string filtered username
 */
function checkUsername($username, $minLen, $maxLen)
{
    //strip whitespace(or other characters) from the beginning and the end of the string
    $temp = trim($username);
    echo strlen($temp);
    if (strlen($temp) < $minLen || strlen($temp > $maxLen)) {
        alert_back('The length of username should be more than '.$minLen.' and less than '.$maxLen.'.');
    }

    $pattern = '/[<>\'\"]/';
    if (preg_match($pattern, $temp)) {
        alert_back('username cannot contain special characters!');
    }

    $specialUsername[0] = 'Jing Wang';
    $specialUsername[1] = 'Gen Liu';
    $specialUsernames = null;
    foreach($specialUsername as $value) {
        $specialUsernames .= $value.'\n';
    }

    if (in_array($temp, $specialUsername)) {
        alert_back($specialUsernames.'The above special usernames cannot be registered.');
    }
    return $temp;
}

/**
 * check password to determine if it is legal
 * @access public
 * @param string $password
 * @param string $confirmedPassword
 * @param  int $minLen
 * @return string $password return a cryptographic password
 */
function checkPassword($password, $confirmedPassword, $minLen) {
    if (strlen($password) < $minLen) {
        alert_back('The length of password should be more than '.$minLen.'.');
    }

    if ($password != $confirmedPassword) {
        alert_back('These passwords do not match.');
    }

    return sha1($password);
}

/**
 * check questions to determine if it is legal
 * @param string $questions
 * @param int $minLen
 * @param int $maxLen
 * @return string $questions return questions
 */

function checkQuestions($questions, $minLen, $maxLen) {
    $stringLen = strlen($questions);

    if ($stringLen < $minLen || $stringLen > $maxLen) {
        alert_back('The length of questions should be more than '.$minLen.' and less than '.$maxLen.'.');
    }

    return $questions;
}

function checkAnswers($questions, $answers, $minLen, $maxLen) {
    $stringLen = strlen($answers);

    if ($stringLen < $minLen || $stringLen > $maxLen) {
        alert_back('The length of answers should be more than '.$minLen.' and less than '.$maxLen.'.');
    }

    if ($questions == $answers) {
        alert_back('Answers should be different from questions.');
    }

    return $answers;
}

function checkEmail($email) {
    if(empty($email)) {
        return null;
    } else {
        if(!preg_match('/^[\w\_\-\.]+@[\w\_\-\.]+(\.\w+)+$/',$email)) {
            alert_back('The email address is illegal.');
        }
    }

    return $email;
}

/**
 * check QQ number to determine if it is legal
 * @access public
 * @param int $number
 * @return int $number
 */
function checkNumber($number) {
    if (empty($number)) {
        return null;
    } else {
        if (!preg_match('/^[1-9]{1}[0-9]{4,10}$/', $number)) {
            alert_back('QQ number is illegal.');
        }
    }

    return $number;
 }

/**
 * check url to determine if it is legal
 * @param string $url
 * @return string $url
 */
function checkUrl($url) {
    if(empty($url) || ($url == 'http://')) {
        return null;
    } else {
        if (preg_match('/^https?:\/\/(\w+\.)?[\w\-\_\.]+(\.\w+)+$/', $url)) {
            alert_back('URL is illegal.');
        }
    }

    return $url;
}
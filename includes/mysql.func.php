<?php
/**
 * Created by PhpStorm.
 * User: WJDSB
 * Date: 2017/9/26
 * Time: 0:01
 */

//if(!defined('IN_TG')) {
//    exit('Access Denied!');
//}

//define('DB_HOST','localhost');
//define('DB_USER','root');
//define('DB_PWD','rootroot');
//define('DB_NAME','test_guest');

function connectDatabase($mysqlObject) {
    if ($mysqlObject->connect_error) {
//        die('Database connection error (' . $mysqlObject->connect_errno . ')' .$mysqlObject->connect_error);
        exit('Database connection error.');
    }
}

function selectDatabase($mysqlObject) {
    if (!$mysqlObject->select_db(DB_NAME)) {
//        die(DB_NAME.' is not existing.');
        exit(DB_NAME.' is not existing.');
    }
}

function queryDatabase($mysqlObject, $queryString) {
    if (!$result = $mysqlObject->query($queryString)) {
        exit('Query failed.');
    }

    return $result;
}

function fetchArray($mysqlObject, $queryString) {
    $query = queryDatabase($mysqlObject, $queryString);

    return $query->fetch_array(MYSQLI_ASSOC);
}

function isRepeat($mysqlObject, $queryString, $info) {
    if (fetchArray($mysqlObject, $queryString)) {
        alert_back($info);
    }
}

function closeDatabase($mysqlObject) {
    if (!$mysqlObject->close()) {
        exit('Database close is abnormal.');
    }

}

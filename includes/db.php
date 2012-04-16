<?php

/**
* To establish conection with database using evn variables 
*
* @package com.abhaysharmawebd.ottawa-skateboard-parks
* @copyright 2012 Abhay Sharma
* @author Abhay Sharma <abhaysharma@abhaysharmawebd.com>
* @link https://github.com/abhaysharma/open-data-app
* @license New BSD License
* @version 1.0.0
*/

$user = getenv("DB_USER");
$pass = getenv("DB_PASS");
$dsn = stripslashes(getenv("DB_DSN"));

$db = new PDO($dsn, $user, $pass);

$db->exec('SET NAMES utf8');
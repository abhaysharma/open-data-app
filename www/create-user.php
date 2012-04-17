<?php

/**
* Creates a user in the database for us to sign-in with . A small utility file for us to create an admin user
*
* @package com.abhaysharmawebd.ottawa-skateboard-parks
* @copyright 2012 Abhay Sharma
* @author Abhay Sharma <abhaysharma@abhaysharmawebd.com>
* @link https://github.com/abhaysharma/open-data-app
* @license New BSD License
* @version 1.0.0
*/

// THIS FILE SHOULD NEVER BE PUBLICALLY ACCESSIBLE !!

require_once '/includes/users.php';
require_once '/includes/db.php';

$email = 'abhaysharma678@gmail.com';
$password = 'password';

user_create($db, $email, $password);
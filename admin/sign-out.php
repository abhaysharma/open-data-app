<?php

/**
* An utility file to signout user and redirect them to sign-in page 
*
* @package com.abhaysharmawebd.ottawa-skateboard-parks
* @copyright 2012 Abhay Sharma
* @author Abhay Sharma <abhaysharma@abhaysharmawebd.com>
* @link https://github.com/abhaysharma/open-data-app
* @license New BSD License
* @version 1.0.0
*/

require_once '../includes/users.php';

user_sign_out();

header('Location: /admin/sign-in.php');
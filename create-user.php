<?php

// A small utility file for us to create an admion user
// THIS FILE SHOULD NEVER BE PUBLICALLY ACCESSIBLE !!

require_once 'includes/users.php';
require_once 'includes/db.php';

$email = 'abhaysharma678@gmail.com';
$password = 'password';

user_create($db, $email, $password);
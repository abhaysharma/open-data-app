<?php

$user = getenv("DB_USER");
$pass = getenv("DB_PASS");
$dsn = stripslashes(getenv("DB_DNS"));

$db = new PDO($dns, $user, $pass);

$db->exec('SET NAMES utf8');
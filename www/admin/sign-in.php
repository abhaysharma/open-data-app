<?php 

/**
* To makesure that user is signed in before entering the admin sectio0n to make changes  
*
* @package com.abhaysharmawebd.ottawa-skateboard-parks
* @copyright 2012 Abhay Sharma
* @author Abhay Sharma <abhaysharma@abhaysharmawebd.com>
* @link https://github.com/abhaysharma/open-data-app
* @license New BSD License
* @version 1.0.0
*/

require_once '../includes/users.php';
require_once '../includes/db.php';

if(user_is_signed_in()){
	header('Location: /admin/index.php');
	exit;
}

$errors = array();
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

// $_SERVER['REFERER']  to get the url from where users are coming.

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors['email'] = true;
	}
	
	if(empty($password)){
		$errros['password'] = true;
	}
	if(empty($errors)){
		
		$user = user_get($db, $email);
		
		if(!empty($user)){
			if(passwords_match($password, $user['password'])){
				user_sign_in($user['id']);
				header('Location: /admin/index.php');
				exit;				
				
			}else{
				$errors['password-no-match'] = true;
			}
		}else{
			$errors['user-non-existent'] = true;
		}
		
		
	}
}


?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign In</title>
	<link href="../css/admin.css" rel="stylesheet">
</head>
<body>
	<div class="signin">
		<form method="post" action="/admin/sign-in.php">
			<div class="email">		
				<label for="email">E-Mail address please<?php if(isset($errors['user-non-existent'])): ?><strong>User not found</strong><?php endif; ?></label>
				<input type="email" name="email" id="email">
			</div>
			<div class="password">	
				<label for="password">Password<?php if(isset($errors['password-no-match'])): ?><strong>Password Wrong</strong><?php endif; ?></label>
				<input type="password" name="password" id="password">
			</div>
				<button type="submit" class="submit">Submit</button>
			
		</form>
	</div>
</body>
</html>
<?php 

require_once '../includes/users.php';
require_once '../includes/db.php';

if(user_is_signed_in()){
	header('Location: /index.php');
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
				header('Location: /index.php');
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
</head>
<body>
	<form method="post" action="/sign-in.php">
		<div>		
			<label for="email">E-Mail address please<?php if(isset($errors['user-non-existent'])): ?><strong>User not found</strong><?php endif; ?></label>
			<input type="email" name="email" id="email">
		</div>
		<div>	
			<label for="password">Password<?php if(isset($errors['password-no-match'])): ?><strong>Password Wrong</strong><?php endif; ?></label>
			<input type="password" name="password" id="password">
		</div>
			<button type="submit">Submit</button>
		
	</form>
</body>
</html>
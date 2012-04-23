<?php
/**
* To edit an existing park in the database 
*
* @package com.abhaysharmawebd.ottawa-skateboard-parks
* @copyright 2012 Abhay Sharma
* @author Abhay Sharma <abhaysharma@abhaysharmawebd.com>
* @link https://github.com/abhaysharma/open-data-app
* @license New BSD License
* @version 1.0.0
*/

require_once '../includes/filter-wrapper.php';
require_once '../includes/users.php';

if (!user_is_signed_in()){
	header('Location: /admin/sign-in.php');
	exit;
}
$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(empty($id)){
	header('Location: /admin/index.php');
	exit;
}


$name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_NUMBER_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$longi = filter_input(INPUT_POST, 'longi', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$lat = filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

if($_SERVER ['REQUEST_METHOD'] == 'POST'){
	if(empty($name)){
		$errors['name'] = true;
	}
	if(empty($address)){
		$errors['address'] = true;
	}
	if(empty($rating)){
		$errors['rating'] = true;
	}
	if(empty($description)){
		$errors['description'] = true;
	}
	if(empty($longi)){
		$errors['longi'] = true;
	}
	if(empty($lat)){
		$errors['lat'] = true;
	}
	if(empty($errors)){
		require_once '../includes/db.php'; 
	
		$sql = $db->prepare('
			UPDATE skateboardparks
			SET name = :name, address = :address, rating = :rating, description = :description, longi = :longi, lat = :lat
			WHERE id = :id
		');	
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->bindValue(':name', $name, PDO::PARAM_STR);
		$sql->bindValue(':address', $address, PDO::PARAM_STR);
		$sql->bindValue(':rating', $rating, PDO::PARAM_INT);
		$sql->bindValue(':description', $description, PDO::PARAM_STR);
		$sql->bindValue(':longi', $longi, PDO::PARAM_STR);
		$sql->bindValue(':lat', $lat, PDO::PARAM_STR);
		
		$sql->execute();
		
		header('Location: /admin/index.php');
		exit;
	}
	
}else{
	require_once '../includes/db.php';
	$sql = $db->prepare('
		SELECT id, name, address, rating, description, longi, lat
		FROM skateboardparks
		WHERE id = :id	
	');
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$parks = $sql->fetch();
	
	$name = $parks['name'];
	$rating = $parks['rating'];
	$address = $parks['address'];
	$description = $parks['description'];
	$longi = $parks['longi'];
	$lat = $parks['lat'];
}


?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Edit &middot; <?php echo $name ?></title>
<link href="../css/admin.css" rel="stylesheet">
</head>

<body>
	<div class="editpage">
		<form method="post" action="/admin/edit.php?id=<?php echo $id; ?>">
			<label for="name">Name<?php if(isset($errors['name'])):?><strong> is required</strong><?php endif;?></label>
			<input type="text" name="name" id="name" value="<?php echo $name;?>">
			
			<label for="address">Address<?php if(isset($errors['address'])):?><strong> is required</strong><?php endif;?></label>
			<input type="text" name="address" id="address" value="<?php echo $address;?>">
			
			<label for="rating">Rating<?php if(isset($errors['rating'])):?><strong> is required</strong><?php endif;?></label>
			<input type="number"  name="rating" id="rating" value="<?php echo $rating;?>">
			
			<label for="description">Description<?php if(isset($errors['description'])):?><strong> is required</strong><?php endif;?></label>
			<input type="text" name="description" id="description" value="<?php echo $description;?>">
			
			<label for="longi">Longitude<?php if(isset($errors['longi'])):?><strong> is required</strong><?php endif;?></label>
			<input type="number" name="longi" id="longi" value="<?php echo $longi;?>">
			
			<label for="lat">Latitude<?php if(isset($errors['lat'])):?><strong> is required</strong><?php endif;?></label>
			<input type="number" name="lat" id="lat" value="<?php echo $lat;?>">	
			<button type="submit" id="submit">Save</button>
		</form>
		<div class="back">
		<a href="/admin/index.php">« Home</a>
		</div>
	</div>
</body>
</html>









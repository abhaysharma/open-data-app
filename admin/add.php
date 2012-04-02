<?php
require_once '../includes/filter-wrapper.php';

$errors = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address',FILTER_SANITIZE_STRING);
$rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_NUMBER_INT);
$description = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
$longi = filter_input(INPUT_POST, 'longi', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$lat = filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

//var_dump($_POST);
//var_dump($lat);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(empty($name)){
		$errors['name'] = true;	
	}
	if(empty($rating)){
		$errors['rating'] = true;	
	}
	if(empty($address)){
		$errors['address'] = true;	
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
			INSERT INTO skateboardparks(name,address,rating,description,longi,lat)
			VALUES(:name,:address,:rating,:description,:longi,:lat)
		');
		
		$sql->bindValue(':name', $name, PDO::PARAM_STR);
		$sql->bindValue(':address', $address, PDO::PARAM_STR);		
		$sql->bindValue(':rating',$rating, PDO::PARAM_INT);
		$sql->bindValue(':description', $description, PDO::PARAM_STR);
		$sql->bindValue(':longi',$longi, PDO::PARAM_STR);
		$sql->bindValue(':lat',$lat, PDO::PARAM_STR);
		
		
		$sql->execute();
		
		header('Location: /index.php');
		exit;
		
	}
	
}
?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Ottawa Skateboard Parks&middot;Add New </title>
</head>
<body>
	<form method="post" action="/add.php">
		<label for = "name">Name:<?php if(isset($errors['name'])):?><strong>is required</strong><?php endif;?></label>
		<input type="text" name="name" id="name" value="<?php echo $name;?>">
		
		<label for = "address">Address:<?php if(isset($errors['address'])):?><strong>is required</strong><?php endif;?></label>
		<input type="text" name="address" id="address" value="<?php echo $address;?>">
		
		<label for = "rating">Rating:<?php if(isset($errors['rating'])):?><strong>is required</strong><?php endif;?></label>
		<input type="number" name="rating" id="rating" value="<?php echo $rating;?>">
		
		<label for = "description">Decription:<?php if(isset($errors['description'])):?><strong>is required</strong><?php endif;?></label>
		<input type="text" name="description" id="description" value="<?php echo $description;?>">
		
		<label for = "longi">Longitude:<?php if(isset($errors['longi'])):?><strong>is required</strong><?php endif;?></label>
		<input type="number" name="longi" id="longi" value="<?php echo $longi;?>">
		
		<label for = "lat">Latitude:<?php if(isset($errors['lat'])):?><strong>is required</strong><?php endif;?></label>
		<input type="number" name="lat" id="lat" value="<?php echo $lat;?>">
		
		<button type="submit" class="submit">Add Location</button>
	</form>
</body>
</html>














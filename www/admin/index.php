<?php

/**
* To show all the parks and allow admin to add, edit and delete locations
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

require_once '../includes/db.php';

$results = $db->query('
	SELECT id, name, address, rating, description, lat, longi
	FROM skateboardparks
	ORDER BY name ASC
');





?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Administration Section</title>
	<link href='http://fonts.googleapis.com/css?family=Frijole|Signika+Negative:400,600,700' rel='stylesheet' type='text/css'>
	<link href="../css/admin.css" rel="stylesheet">
</head>
<body>
	<div class="admin-wrapper">
		<div class="buttons">
			<a href="sign-out.php" class="signout">Sign Out</a>
			
			<div class="add">
				<a href="../index.php" class="linkhome">Home Page</a>
				<a href="add.php" class="addnew">Add a new Location</a>
			</div>
		</div>
		<ul class="parks-list">
			<?php foreach($results as $parks):?>
				<li><?php echo 
						 '<h1>'.$parks['name'] . '</h1>' 
						.'<p>'.$parks['address'] .'</p>'
					?>
						<meter value="<?php echo $parks['rating']; ?>" min="0" max="5"><?php echo $parks['rating']; ?></meter><!--.'<p>'.$parks['rating'] .'</p>'-->
					<?php echo 
						 '<p>'.$parks['description'].'</p>'
						.'<p>'.$parks['longi'].'</p>'
						.'<p>'.$parks['lat'].'</p>'
					;?>
				</li>
				<a href="edit.php?id=<?php echo $parks['id'];?>">Edit</a>
				<a href="delete.php?id=<?php echo $parks['id']; ?>">Delete</a>
				<hr>
			<?php endforeach; ?>
		</ul>
	</div>	
</body>
</html>
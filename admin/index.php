<?php
require_once '../includes/filter-wrapper.php';
require_once '../includes/users.php';

if (!user_is_signed_in()){
	header('Location: /sign-in.php');
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
</head>
<body>
	<div>
		<a href="sign-out.php">Sign Out</a>
	</div>
	<div>
		<a href="add.php">Add a new Location.</a>
		<a href="../index.php">Home</a>
	</div>
	<ul>
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
		<?php endforeach; ?>
	</ul>
	
</body>
</html>
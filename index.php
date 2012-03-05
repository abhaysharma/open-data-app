<?php
error_reporting(-1);
ini_set('display_errors','on');

require_once 'includes/filter-wrapper.php';
require_once 'includes/db.php';
$results = $db->query('
	SELECT id, name, address, rating
	FROM skateboardparks 
	ORDER BY name ASC
');
?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Ottawa Skateboard Parks &middot; Home</title>
	
</head>
<body>
	<header>
		<h1>Ottawa Skateboard Parks App</h1>
	</header>
	<a href="admin/index.php">Admin</a>
	<div class="map">
		
		
	</div>
	<div class="list-area">
		<ul class="search">
			<a href="#location" class="location">Location</a>
			<input type="text" name="searchbar" class="search-bar">
			<a href="#go" class="location">Go</a>
		</ul>
		<ul>
			<?php foreach($results as $parks):?>
				<li><a href="single.php?id=<?php echo $parks['id']; ?>"><?php echo $parks['name']; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	
</body>
</html>
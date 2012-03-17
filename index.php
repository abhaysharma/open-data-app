
<?php
//error_reporting(-1);
//ini_set('display_errors','on');

require_once 'includes/filter-wrapper.php';
require_once 'includes/db.php';
$results = $db->query('
	SELECT id, name, address, rating, longi, lat
	FROM skateboardparks 
	ORDER BY name ASC
');

$title = "Home";

include 'includes/theme-top.php'

?>

	
	<div class="wrapper">
	
	<div id="map"> </div>
	
	<div class="list-area">
	
		<a href="admin/index.php">Admin</a>
		<ul class="search">
			<a href="#location" class="location">Location</a>
			<input type="text" name="searchbar" class="search-bar">
			<a href="#go" class="location">Go</a>
		</ul>
		
		<ul class="list">
			<?php foreach($results as $parks):?>
				<li itemscope itemtype="http://schema.org/TouristAttraction">
					<a href="single.php?id=<?php echo $parks['id']; ?>" itemprop="name"><?php echo $parks['name']; ?></a>
					<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates" >
						<meta itemprop="latitude" content="<?php echo $parks['lat']; ?>">
						<meta itemprop="longitude" content="<?php echo $parks['longi']; ?>">
						
						
					</span>
				</li>
				
			<?php endforeach; ?>
		</ul>
	
	</div>
	<div class="list-style"> </div>
	</div>
<?php include 'includes/theme-bottom.php'?>
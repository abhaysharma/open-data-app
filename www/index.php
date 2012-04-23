
<?php


/**
* Displays the list and map for the Open Data Set
*
* @package com.abhaysharmawebd.ottawa-skateboard-parks
* @copyright 2012 Abhay Sharma
* @author Abhay Sharma <abhaysharma@abhaysharmawebd.com>
* @link https://github.com/abhaysharma/open-data-app
* @license New BSD License
* @version 1.0.0
*/

//error_reporting(-1);
//ini_set('display_errors','on');

require_once 'includes/filter-wrapper.php';
require_once 'includes/db.php';
$results = $db->query('
	SELECT id, name, address, rating, longi, lat, numrate
	FROM skateboardparks
	ORDER BY name ASC
');

$title = "Home";

include 'includes/theme-top.php'

?>

<div class="wrapper">
	
	<div id="map"> </div>
	
	<div class="list-area">
		<div class="form-area clearfix">
			<div class="location">
				<img src="/images/location.png" id="geo" alt="from your current location">
			</div>
			<form id="geo-form">
				<input id="adr" placeholder="Type your addresss..">
			</form>
			<div class="search">
				<img src="/images/search.png" id="submitaddr" alt="submit button">
			</div>
		</div>
		<ul class="list clearfix">
			<?php foreach($results as $parks):?>
				<?php 
					if($parks['numrate'] > 0){
						$rated = round($parks['rating']/$parks['numrate']);
					}else{
						$rated = 0;
					}
					
					
				?>
				<li itemscope itemtype="http://schema.org/TouristAttraction" data-id="<?php echo $parks['id']; ?>">
					
					<a href="/skateboardpark/<?php echo $parks['id']; ?>" itemprop="name"><?php echo $parks['name']; ?></a>
					<span class="myAddress" itemprop="address"><?php echo $parks['address']; ?></span>
					<span class="distance"></span>
					<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates" >
						<meta itemprop="latitude" content="<?php echo $parks['lat']; ?>">
						<meta itemprop="longitude" content="<?php echo $parks['longi']; ?>">
					</span>
					<meter value="<?php echo $rated; ?>" min="0" max="5">Rating:<?php echo $rated;?></meter>
					
					<ol class="rater">
						
						<?php for($i=1; $i <= 5; $i++):?>
							<?php $class = ($i <= $rated) ? 'is-rated' : ''; ?>
							<li class="rater-level <?php echo $class; ?>">★</li>
						<?php endfor; ?>
						
					</ol>
					
				</li>
				
			<?php endforeach; ?>
		</ul>
		
	</div>
	<div class="list-style"> </div>
</div>
<?php include 'includes/theme-bottom.php'?>



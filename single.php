<?php

/**
* Displays information about the single park, it allows user to rate as well as see their previous ratings
*
* @package com.abhaysharmawebd.ottawa-skateboard-parks
* @copyright 2012 Abhay Sharma
* @author Abhay Sharma <abhaysharma@abhaysharmawebd.com>
* @link https://github.com/abhaysharma/open-data-app
* @license New BSD License
* @version 1.0.0
*/



	require_once 'includes/filter-wrapper.php';
	require_once 'includes/functions.php';
	
	
	$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
	
	if(empty($id)){
		header('Location: /index.php');
		exit;
	}
	
	require_once 'includes/db.php';
	
	$sql = $db->prepare('
		SELECT id, name, address, rating, description, lat, longi, numrate
		FROM skateboardparks
		WHERE id = :id
	');
	
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$parks = $sql->fetch();
	
	if(empty($parks)){
		header('Location: /index.php');
		exit;
	}
	
	$title = $parks['name'];
	
	if($parks['numrate'] > 0){
		$rated = round($parks['rating']/$parks['numrate']);
	}else{
		$rated = 0;
	}
	
	$cookie = get_rate_cookie();
	
	include 'includes/theme-top.php';

?>

	<div class="single">
    	<div id="map2"></div>
		<h2><?php echo $parks['name'];?></h2>
		
        <p>Address: <?php echo $parks['address'];?></p>
		
        <meter value="<?php echo $rated; ?>" min="0" max="5">Rating:<?php echo $rated ;?></meter>
		
        <p>Description: <?php echo $parks['description'];?></p>
		
        <p>Latitude:<?php echo ' ' . $parks['lat']; ?></p>
		
        <p>Longitude:<?php echo ' ' . $parks['longi']; ?></p>
		
        <a href="index.php">Home</a>
	
			<?php if(isset($cookie[$id])):?>
            
                <h3>Your Rating</h3>
                <ol class = "rater rater-usable">
                    <?php for($i = 1 ; $i <= 5; $i++):?>
                        <?php $class = ($i <= $cookie[$id]) ? 'is-rated' : ''; ?>
                        <li class=" rater-level <?php echo $class; ?>">★</li>
                    <?php endfor; ?>
        	    </ol>
            	<?php else:?>
            
                    <h3>Rate This</h3>
                    <ol class="rater rater-usable">
                        <?php for($i = 1 ; $i <= 5 ; $i++):?>
                            <li class="rater-level"><a href= "rate.php?id=<?php echo $parks['id']; ?>&rating=<?php echo $i; ?>">★</a></li>
                        <?php endfor; ?>
                    </ol>
			<?php endif; ?>		
	</div>
		
		
	
	
	
	
	
	
	
	
	
	<?php include 'includes/theme-bottom.php'?>
<?php

/**
* Saves the ratings in the database and increases the number of times rating is done
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

$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$rate = filter_input(INPUT_GET, 'rating', FILTER_SANITIZE_NUMBER_INT);

$cookie = get_rate_cookie();

if(empty($id)){
	header ('Location: /index.php');
	exit();
}

if(isset($cookie[$id])||empty($rate)||$rate<0||$rate>5){
	header('Location: /single.php');
	exhit();
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	
	if(empty($rate)){
		$eroors['rate'] = true;
	}
	
	if(empty($errors)){
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
			UPDATE skateboardparks
			SET rating = rating + :rating, numrate = numrate + 1
			WHERE id = :id
		');
		
		$sql->bindValue(':rating', $rate, PDO::PARAM_INT);
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		
		save_rate_cookie($id, $rate);
		
		
		
		
		header('Location: /single.php?id='.$id);
		exit;
	}
	
	
	
}
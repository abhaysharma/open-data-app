<?php

require_once 'includes/filter-wrapper.php';

$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$rate = filter_input(INPUT_GET, 'rating', FILTER_SANITIZE_NUMBER_INT);

$cookie = get_rate_cookie();

if(empty($id)||empty($rate)||$rtae<0||$rate>5){
	header ('Location: index.php');
	exit();
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
		
		header('Location:index.php');
		exit;
	}
	
	
	
}
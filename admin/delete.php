<?php

/**
* To delete a park from the database
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
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(empty($id)){
	header('Location: /index.php');
	exit;
}

require_once '../includes/db.php';

$sql = $db->prepare('
	DELETE FROM skateboardparks
	WHERE id = :id	
	LIMIT 1
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);

$sql->execute();

header('Location: /admin/index.php');
exit;
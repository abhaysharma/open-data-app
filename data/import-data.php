<?php
require_once '../includes/users.php';

if (!user_is_signed_in()){
	header('Location: /admin/sign-in.php');
	exit;
}
require_once '../includes/db.php';

$places_xml = simplexml_load_file('2009_skateboard_parks.kml');
//$places_xml = simplexml_load_file('communityGardens.kml');

$sql = $db->prepare('
	INSERT INTO skateboardparks (name,  longi, lat, address)
	VALUES (:name, :longi, :lat, :address)
');

//foreach($places_xml->Document->Folder[0]->Placemark as $place)
foreach($places_xml->Document->Placemark as $place){
	//echo $place->name;
	$name = '';
	$address = '';
	$coords = explode(',',trim( $place->Point->coordinates));
	//$adr='';
	/*
		explode separates the strin. it uses 
		1. the first attr as the refference in our case it is ','
		2. the string to be exploded
		
		'trim' is to remove the extra spaces from the exploded string
	*/

	foreach ($place->ExtendedData->Data as $civic){
		if ($civic->attributes()->name == 'Type'){
			$name = ucwords(strtolower($civic->value));
		}
		
		if ($civic->attributes()->name == 'Address'){
			$address = ucwords(strtolower($civic->value));
		}
	}
	$sql->bindValue(':name', $name, PDO::PARAM_STR);
	$sql->bindValue(':address', $address, PDO::PARAM_STR);
	$sql->bindValue(':longi', $coords[0], PDO::PARAM_STR);
	$sql->bindValue(':lat', $coords[1], PDO::PARAM_STR);
	$sql->execute();
}

var_dump($sql->errorInfo());

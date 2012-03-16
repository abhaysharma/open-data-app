<?php

require_once '../includes/db.php';

$places_xml = simplexml_load_file('2009_skateboard_parks.kml');
//$places_xml = simplexml_load_file('communityGardens.kml');

$sql = $db->prepare('
	INSERT INTO skateboardparks (name,  longi, lat)
	VALUES (:name, :longi, :lat)
');

foreach($places_xml->Document->Folder[0]->Placemark as $place){
	//echo $place->name;
	
	$coords = explode(',',trim( $place->Point->coordinates));
	//$adr='';
	/*
		explode separates the strin. it uses 
		1. the first attr as the refference in our case it is ','
		2. the string to be exploded
		
		'trim' is to remove the extra spaces from the exploded string
	*/
	/*foreach ($place->ExtendedData->SchemaData->SimpleData as $civic){
		if ($civic->attributes()->name == 'LEGAL_ADDR'){
			$adr = $civic;
		}
	}*/
	
	$sql->bindValue(':name', $place->name, PDO::PARAM_STR);
	//$sql->bindValue(':address', $adr, PDO::PARAM_STR);
	$sql->bindValue(':longi', $coords[0], PDO::PARAM_STR);
	$sql->bindValue(':lat', $coords[1], PDO::PARAM_STR);
	$sql->execute();
}

var_dump($sql->errorInfo());

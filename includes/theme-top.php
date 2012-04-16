<?php
/**
* An include file to be included on the top of the pages, reduces code repetition
*
* @package com.abhaysharmawebd.ottawa-skateboard-parks
* @copyright 2012 Abhay Sharma
* @author Abhay Sharma <abhaysharma@abhaysharmawebd.com>
* @link https://github.com/abhaysharma/open-data-app
* @license New BSD License
* @version 1.0.0
*/
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	
	<title><?php if(isset($title)){echo $title .'‧' ;} ?> Ottawa Skateboard Parks </title>
	
	<link href='http://fonts.googleapis.com/css?family=Frijole|Signika+Negative:400,600,700' rel='stylesheet' type='text/css'>
	<?php if($_SERVER['HTTP_HOST'] == 'skateboardpark'):?>
	<link href="/css/public.css" rel="stylesheet">
	<?php else : ?>
	<link href="/css/public.min.css" rel="stylesheet">
	<?php endif; ?>
	<script src="/js/modernizr.min.js"></script>
</head>
<body>
	<header>
		<h1>Ottawa Skateboard Parks</h1>
	</header>
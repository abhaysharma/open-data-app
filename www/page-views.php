<?php

/**
* Sets the session for a user and tracks how many time the page is viewed
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
	<title>Page Views</title>
</head>
<body>
	<?php 
		//Track how many times you've viewed this page for this session
		
		//Turn on sessions
		session_start();
		
		// Session information is stored in the $_SESSION super global
		$_SESSION['page-views'] += 1;
		
	?>
	
	<strong>You've visited this page <?php echo $_SESSION['page-views']; ?> times.</strong>
</body>
</html>
<?php
/**
* An include file to be included at bottom of the pages, reduces code repetition
*
* @package com.abhaysharmawebd.ottawa-skateboard-parks
* @copyright 2012 Abhay Sharma
* @author Abhay Sharma <abhaysharma@abhaysharmawebd.com>
* @link https://github.com/abhaysharma/open-data-app
* @license New BSD License
* @version 1.0.0
*/
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDekT-qRPGrK5KNoUffibrV3_0Napcreq0&sensor=false"></script>
	<script src="/js/latlng.min.js"></script>

	<?php if($_SERVER['HTTP_HOST'] == 'skateboardpark'):?>
	<script src="/js/open-data-app.js"></script>
	<?php else : ?>
	<script src="/js/open-data-app.min.js"></script>
	<?php endif; ?>
	
	
</body>
</html>
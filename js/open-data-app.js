$(document).ready(function(){
	
	var gmapOptions = {
		center : new google.maps.LatLng(45.423494,-75.697933)
		, zoom : 13
		, mapTypeId : google.maps.MapTypeId.ROADMAP	
			
	};
	
	var map = new google.maps.Map(document.getElementById('map'), gmapOptions );
	
	var infoWindow;
	
	$('.list > li').each(function(){
		var park = $(this).find('a').html();
		
		
		var info = '<div class="info-window">'
					+'<strong>' + park + '</strong>'
					+'<a href="single.php?id=' + $(this).attr('data-id') + '#rate">Rate This!</a>' 
					+'</div>'
			;
		var lng = $(this).find('meta[itemprop="longitude"]').attr('content');
		var lat = $(this).find('meta[itemprop="latitude"]').attr('content');
		
		var pos = new google.maps.LatLng(lat,lng);
	console.log(pos);
		var marker = new google.maps.Marker({
			position: pos
			,map : map
			,title : park
			,icon : 'images/marker.png'
			,animation : google.maps.Animation.DROP
		});
		
		function showInfoWindow(ev){
			if(ev.preventDefault){
				ev.preventDefault();
			}
			if(infoWindow){
				infoWindow.close();
			}
			
			infoWindow = new google.maps.InfoWindow({
			
				content : info
			
			});
			infoWindow.open(map, marker);			
			
		}
		
		
		
		google.maps.event.addListener(marker, 'click', showInfoWindow);
		
		google.maps.event.addDomListener($(this).children('a').get(0), 'click', showInfoWindow);
	});
	
	/*RATINGS*/
	
	








});


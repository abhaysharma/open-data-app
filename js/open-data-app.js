$(document).ready(function(){
	 

	var locations = [];
	
	if (document.getElementById('map')) {	
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
						+'<a href="skateboardpark/' + $(this).attr('data-id') + '#rate">Rate This!</a>' 
						+'</div>'
				;
				
			var lng = parseFloat($(this).find('meta[itemprop="longitude"]').attr('content'));
			var lat = parseFloat($(this).find('meta[itemprop="latitude"]').attr('content'));
			
			var pos = new google.maps.LatLng(lat,lng);
		
			locations.push({
				id : $(this).attr('data-id')
				, lat : lat
				, lng : lng
			});
		
			var marker = new google.maps.Marker({
				position: pos
				,map : map
				,title : park
				,icon : '/images/marker.png'
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
	}
	/*RATINGS*/
	
	
	var $raterLi = $('.rater-usable li');
		console.log($raterLi);
	  // Makes all the lower ratings highlight when hovering over a star
	  $raterLi.on('mouseenter', function (ev) {
		  var current = $(this).index();
		
		  for (var i = 0; i < current; i++) {
			$raterLi.eq(i).addClass('is-rated-hover');
		  }
		})
		.on('mouseleave', function (ev) {
		  $raterLi.removeClass('is-rated-hover');
	});

	/*GEOLOCATION*/
	
	var newMarker;
	
	function displayUserLoc(lat, lng){
		var locDistances = []
		,totalLocs = locations.length
		,userLoc = new google.maps.LatLng(lat, lng);
		;
		
		if(newMarker){
			newMarker.setPosition(userLoc);
		}else{
			newMarker = new google.maps.Marker({
				position: userLoc
				,map : map
				,title : 'You are here.'
				,icon: '/images/new.png'
				,animation : google.maps.Animation.DROP
			});
		}
		
		map.setCenter(userLoc);
		
	
		
		var current = new LatLon(lat, lng);
		
		for(var i = 0; i < totalLocs; i++){
			locDistances.push({
				id : locations[i].id
				,distance : parseFloat(current.distanceTo(new LatLon(locations[i].lat, locations[i].lng)))
			});
		}
		
		locDistances.sort(function(a,b){
			return a.distance - b.distance;
		});
		
		var $parksList = $('.list');
		
		for(var j = 0; j<totalLocs; j++){
			$li = $parksList.find('[data-id="' + locDistances[j].id + '"]');
			
			$li.find('.distance').html(locDistances[j].distance.toFixed(1) + 'km')
			
			$parksList.append($li);
		}
	}
		
	if(navigator.geolocation){
$("#submitaddr").click(function(){
	$("#geo-form").submit();
	
});
		$('#geo').click(function(){
			navigator.geolocation.getCurrentPosition(function(pos){
				displayUserLoc(pos.coords.latitude, pos.coords.longitude);
			});
		});
	}
	
	$('#geo-form').on('submit', function(ev){
		ev.preventDefault();
		console.log('form');
		var geocoder = new google.maps.Geocoder();
		
		geocoder.geocode({
				address: $('#adr').val() + 'Ottawa, ON'
				, region : 'CA'
			},function(results, status){
						if(status == google.maps.GeocoderStatus.OK){
							displayUserLoc(results[0].geometry.location.lat(),results[0].geometry.location.lng());
						}
				}
		);
	});
	   
});








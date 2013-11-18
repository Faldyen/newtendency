
document.addEventListener("touchstart", function(){}, true);

$(document).ready( function() {



	JetZoom.quickStart();
/*
	$('.main.wrapper .posts').masonry({
		
		columnWidth: 310,
		itemSelector: '.post',
		gutter: 10			
	});
*/
	
	
	var map;
	function initialize() {
		
		var latlng = new google.maps.LatLng(52.486606300000005,13.436245100000011);
		
		var mapOptions = {
	    	zoom: 15,
	    	center: latlng,
			disableDefaultUI: true,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.LARGE,
				position: google.maps.ControlPosition.LEFT_CENTER
			},
	    	mapTypeId: google.maps.MapTypeId.ROADMAP
	  	};
	  	
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
		var infocontent = ''+
			''+
			'<div id="google-maps-window">'+
			'<img src="http://dev.newtendency.de/newtendency/wp-content/themes/newtendency/img/NEW-TENDENCY-Logo.jpg"><br>'+
			''+
			'Weichselstrasse 22<br>'+
			'10245 Berlin<br>'+
			'<br>'+
			'+49 30 246 30 500'+
			''+
			'</div>';
		
		var infowindow = new google.maps.InfoWindow({
			content: infocontent,
			position: latlng
		});
		
		infowindow.open(map);
		
		
		
		var noPoi = [
		{
		    featureType: 'poi',
		    stylers: [
		      { visibility: 'off' }
		    ]   
		  }
		];

		map.setOptions({styles: noPoi});
		
	}

	google.maps.event.addDomListener(window, 'load', initialize);

} );
function initialize() {

	var myLatlng = new google.maps.LatLng(43.1074188, 12.378599699999995);

	var mapOptions = {
		zoom : 16,
		center : myLatlng
	};

	var map = new google.maps.Map(document.getElementById('map-canvas'),
			mapOptions);

	var marker = new google.maps.Marker({
		position : myLatlng,
		map : map,
		title : 'Via Mario Angeloni, 27 - Perugia (PG)'
	});
}

google.maps.event.addDomListener(window, 'load', initialize);
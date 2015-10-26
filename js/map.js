jQuery(document).ready(function($){
	var center = new google.maps.LatLng(20.528819,-99.897685);
	var mapOptions = {
			center: center,
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false
		};
		var map = new google.maps.Map($('#mapa').get(0), mapOptions);

		var marker = new google.maps.Marker({
			position: center,
			map: map,
			title: 'Tu Cine',
			animation: google.maps.Animation.BOUNCE
		});
});

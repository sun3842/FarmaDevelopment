<html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>


<script>
$(document).ready(function () {
function initialize() {

// Define the latitude and longitude positions
var latitude = parseFloat("<?php echo $branch_info['branch_lat_value']; ?>"); // Latitude get from above variable
var longitude = parseFloat("<?php echo $branch_info['branch_long_value']; ?>"); // Longitude from same
var latlngPos = new google.maps.LatLng(latitude, longitude);

// Set up options for the Google map
var myOptions = {
zoom: 18,
center: latlngPos,
mapTypeId: google.maps.MapTypeId.ROADMAP,
zoomControlOptions: true,
zoomControlOptions: {
style: google.maps.ZoomControlStyle.LARGE
}
};
// Define the map
map = new google.maps.Map(document.getElementById("display_map"), myOptions);
 addMarker(latlngPos, 'Default Marker', map);

 google.maps.event.addListener(map, 'dragstart', function(event) {

// // Add the marker
// var marker = new google.maps.Marker({
// position: latlngPos,
// map: map,
// draggable: true,
// //icon:'pinkball.png',
// title: "Via Luca Pacioli, 06124 Perugia, Italy"
// });


// var infowindow = new google.maps.InfoWindow({
  // content:"Via Luca Pacioli, 06124 Perugia, Italy"
  // });
addMarker(event.latlngPos, 'Click Generated Marker', map);

 var lat, lng, address;

 });
}
 function addMarker(latlng,title,map) {
 var marker = new google.maps.Marker({
 position: latlng,
 map: map,
 title: title,
 icon:'<?php echo base_url();?>asset_app/img/map-red.png',
 draggable:true,
 animation: google.maps.Animation.DROP
 });

google.maps.event.addListener(marker,'drag',function(event) {
 document.getElementById('lat').value = event.latLng.lat();
 document.getElementById('lng').value= event.latLng.lng();
 });

google.maps.event.addListener(marker,'dragend',function(event) {
 document.getElementById('lat').value = event.latLng.lat();
 document.getElementById('lng').value = event.latLng.lng();
 alert(marker.getPosition());
 });
 google.maps.event.addListener(map, 'zoom_changed', function () {
 document.getElementById('zoom').value =map.getZoom();
 });

}
google.maps.event.addDomListener(window, 'load', initialize);
});
</script>
<div id="display_map" style="width:100%;height:100%; "></div> 

</html>

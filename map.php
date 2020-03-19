<!-- Script for Google Maps UI -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqpU9_3Egn7sfsW2CSFlp7H8Ohp0dQ7Hg&sensor=false"></script>
<script>
  function initialize(){
    var mapProp = {
      center: new google.maps.LatLng(70,-70),
      zoom:12,
      disableDefaultUI:false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker = new google.maps.Marker({
    position: new google.maps.LatLng(70,-70),
    map: map,
    title: 'Alan'});
    var marker2 = new google.maps.Marker({
    position: new google.maps.LatLng(70.01,-70.03),
    map: map,
    title: 'Jimmy'});
    var marker3 = new google.maps.Marker({
    position: new google.maps.LatLng(70,-70.03),
    map: map,
    title: 'Omri'});
    var marker4 = new google.maps.Marker({
    position: new google.maps.LatLng(70.01,-69.94),
    map: map,
    title: 'Jordan'});
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="googleMap" style="width:100%;height:600px;"></div>

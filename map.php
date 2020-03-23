<!-- Script for Google Maps UI -->
<?php
if (session_status() != PHP_SESSION_ACTIVE){
  header("Location: index.php");
};
$residentID = $_SESSION['user_ID'];
$cart_select_sql = "SELECT residentID, name, latCord, lonCord FROM resident WHERE resthomeID=$residentID";
$cart_select_qry = mysqli_query($dbconnect, $cart_select_sql);
?>

<h3 class='text-center my-5'>map</h3>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqpU9_3Egn7sfsW2CSFlp7H8Ohp0dQ7Hg&sensor=false"></script>
<script>
  function initialize(){
    var mapProp = {
      center: new google.maps.LatLng(<?php echo $_SESSION['latCord']?>,<?php echo $_SESSION['lonCord']?>),
      zoom:12,
      disableDefaultUI:false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('googleMap'),mapProp);
    <?php
      while ($cart_select_aa = mysqli_fetch_assoc($cart_select_qry)){
        $latCord = $cart_select_aa['latCord'];
        $lonCord = $cart_select_aa['lonCord'];
        $name = $cart_select_aa['name'];
        echo "
        var marker = new google.maps.Marker({
        position: new google.maps.LatLng($latCord,$lonCord),
        map: map,
        title: '$name'});
        marker.setMap(map);
        ";
      }
    ?>}
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class='col-4'style="float:left;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
<div id="googleMap" class='col-8' style="height:600px;float:right;"></div>

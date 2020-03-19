<?php
//Checks whether the user is logged in - if they aren't then they get redirected to the home page
if (session_status() != PHP_SESSION_ACTIVE){
  header("Location: index.php");
}
//If they are logged in then it check whether they are an admin, if they aren't then they are redirected to the home page
else if ($_SESSION['admin'] == 0){
  header("Location: index.php");
}
?>

<!doctype html>
<?php
  //sets up $dbconnect initially, this is used to connect to database when ever any sql code is used
  $dbconnect = mysqli_connect("jnugvpmyub", "root", "root", "cottonstreet");

  /*Starts a session if no sessions have been started, this is done so information in the session can be accessed by the page
  i.e. allows the website to know if you are logged in or not*/
  if (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) {
    session_start();
  }
  /*if the user is has selected the logout button, or the user has not logged in yet (nothing set in the session),
  then the session is destroyed*/
  if (isset($_GET['logout']) || !isset($_SESSION['user_ID'])){
    session_destroy();
  }
?>
<!--Language is english-->
<html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='invictus.css'>

    <!--Title of the website-->
    <title>Devota</title>
  </head>
  <body>
    <!--Container fluid so the container is full-width instead of fixed-width-->
    <div class='container-fluid'>
      <?php
        //Includes the navbar, it is present on every page, hence why it is included on the base page
        include('navbar.php');

        //This code checks the $_GET array to determine what page to display, this is a one page website
        if (isset($_GET['page'])){
          $page_name = $_GET['page'];

          //Checks if a page with the name in the $_GET array exists
          if (file_exists("$page_name.php")){
            //If the page does exist then it is displayed
            include("$page_name.php");
          }

          //If page doesn't exist an error message is displayed
          else{
            include('error404.php');
          }
        }
        //Shows the default, home page if the $_GET array has no page name
        else{
          include('home.php');
        }
        include('footer.php');
      ?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
  </body>
</html>

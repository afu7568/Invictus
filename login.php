<?php
  //Checks whether the user has actually attempted to login
  if (isset($_POST['login'])){

    //Verifies the user has not logged in already
    if (session_status() == PHP_SESSION_NONE) {

      //Converts login details from the $_POST array in variables
      $username = $_POST['username'];
      $password = $_POST['password'];

      //Cleanses the username input to avoid basic SQL injection
      $username = mysqli_real_escape_string($dbconnect, $username);

      //This SQL checks the database for user who have the entered username
      $login_sql = "SELECT * FROM resthome WHERE username='$username'";
      $login_qry = mysqli_query($dbconnect, $login_sql);
      if ($login_qry){
        $login_aa = mysqli_fetch_assoc($login_qry);
        //Checks if the entered password is that same as the password in the database
        //The password in the database is encrypted
        if (password_verify($password, $login_aa['password'])){

          //If a correct username and password are entered then a session is set up containing the user's ID
          session_start();
          $_SESSION['user_ID']=$login_aa['userID'];
          $_SESSION['admin']=$login_aa['admin'];
          $_SESSION['latCord']=$login_aa['latCord'];
          $_SESSION['lonCord']=$login_aa['lonCord'];

          //Redirects away from the login page
          header("Location: index.php");
        }
        //If entered password does not match or the username doesn't exist then this message is outputted
        else{
          $feedback_message = "<br><b class='loginSignUpMessage'>Incorrect Username or Password</b>";
        }
      }
    }
  }
?>

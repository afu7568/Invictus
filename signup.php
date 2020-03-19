<?php
  //Checks if the user has attempted to sign up
  if (isset($_POST['signup'])){

    //Error catching to prevent blank inputs for username and passwords
    if ($_POST['newusername'] != '' && $_POST['newpassword'] != '' && $_POST['confirmpassword'] != ''){

      //Error catching to make sure the length of the password and username aren't greater than 20 char
      if (strlen($_POST['newusername']) < 20 || strlen($_POST['newpassword']) < 20){

        //Error catching to make sure entered passwords are the same
        if ($_POST['newpassword'] == $_POST['confirmpassword']){

          //Puts entered username into a variable
          $new_username = $_POST['newusername'];
          //Cleanses the username inputted to avoid basic SQL injection
          $new_username = mysqli_real_escape_string($dbconnect, $new_username);

          //Searches the database for accounts with same username
          $username_check_sql = "SELECT * FROM user WHERE username='$new_username'";
          $username_check_qry = mysqli_query($dbconnect, $username_check_sql);
          if ($username_check_qry){
            $username_check_aa = mysqli_fetch_assoc($username_check_qry);

            //Checks that no accounts have the entered username
            if (!$username_check_aa){

              //The password is hashed for security and the account info is added to the database
              $new_password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
              $signup_sql ="INSERT INTO user (userID, username, password, admin)
              VALUES (NULL, '$new_username', '$new_password', 0)";
              $signup_qry = mysqli_query($dbconnect, $signup_sql);

              //Message telling the user their account has been set up
              echo '<br><b class="loginSignUpMessage">Sign Up Successful</b>';
            }
            //If the username is already taken then feedback is given to the user
            else{
              echo '<br><b class="loginSignUpMessage">Username already taken</b>';
            }
          }
        }
        //Feedback if passwords dont match
        else{
          echo '<br><b class="loginSignUpMessage">Passwords are not the same</b>';
        }
      }
      //feedback if username or password are too long
      else{
        echo '<br><b class="loginSignUpMessage">Please keep username and password length under 20 characters</b>';
      }
    }
    //Feedback message if inputs are left empty
    else{
      echo '<br><b class="loginSignUpMessage">Please enter username, password, and confirm that password</b>';
    }
  }
?>


<!-- The Login/SignUp Page. This page allows for the a user to create and account and login into the website.
Having an account for this site is required for purchasin items. This is so that information of what the user has
added to their cart can have specific references to their acount instead of using methods like cookies. It also
allows for flexibility in the future by adding in functionallity like remembering past order, user information, etc.-->
<?php
  include('login.php');
 ?>
<div class="row">

  <!--Login section of the page-->
  <div class="col-lg-3"></div>
  <div class="col-md-12 col-lg-6 mt-3 mb-5 text-center">
    <h3>Login</h3>
    <form action="index.php?page=loginsignup" method="post">
      <input class="login-input" type="text" name="username" placeholder="Username" maxlength="19" required/>
      <br>
      <input class="login-input" type="password" name="password" placeholder="Password" maxlength="19" required/>
      <br>
      <input class="py-2 px-3 m-2 button-style-2" type="submit" name="login" value="Login" />
    </form>
    <?php
      //If feedback message was given by the login.php function then it is displayed
      if(isset($feedback_message)){
        echo "$feedback_message";
      }
    ?>
  </div>
  <div class="col-lg-3"></div>
</div>

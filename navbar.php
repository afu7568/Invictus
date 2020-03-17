
<!-- The Navbar. This is displayed on every page and contains navigation links to almost every part of the site
also is used to log out. The links displayed will depend on whether you are logged in or not, i.e. providing access to admin section if you are admin-->

<div class="row">

  <!-- Navbar style is set to light as it fit with the style of my site, and allows for the navbar collapse image to be visible-->
  <nav class='navbar navbar-light navbar-expand-lg col-12 custom-nav position-fixed'>

    <!--Displays logo-->
    <a class="" href="index.php"><img class='' src="Logo.png" height="100%" width="50px"></a>

    <!--Collapsing navbar so that the website is responsive for different device sizes-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon navbar-dark"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!--List of navbar items on the left side-->
      <ul class="navbar-nav mr-auto">
        <li class='nav-item'>
          <a class='nav-link p-3 my-2 mx-3' href='index.php'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link p-3 my-2 mx-3' href='index.php?page=contact'>Contact</a>
        </li>
        <li class='nav-item dropdown'>
          <a class="nav-link dropdown-toggle p-3 my-2 mx-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Products
          </a>

          <!-- Dropdown menu which displays all categories-->
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class='dropdown-item' href='index.php?page=products&category=*'>All</a>
            <a class='dropdown-item' href='index.php?page=products&category=invictus'>Invictus</a>
            <!--<?php

              //Creates the option in the dropdown that allows you to view all products/books
              echo "<a class='dropdown-item' href='index.php?page=products&category=*'>All</a>";

              //Queries that pulls all categories out of the database to display in the dropdown
              $nav_category_sql = "SELECT categoryID, name FROM category ORDER BY name";
              $nav_category_qry = mysqli_query($dbconnect, $nav_category_sql);

              //Loops through every category from the database
              while ($nav_category_aa = mysqli_fetch_assoc($nav_category_qry)){

                //Assigns the category information into variables
                $category_ID = $nav_category_aa['categoryID'];
                $category_name = $nav_category_aa['name'];

                //Creates an option for the dropdown menu that allows the user to view products from that category
                echo "<a class='dropdown-item' href='index.php?page=products&category=$category_ID'>$category_name</a>";
              }
            ?>-->
          </div>
        </li>
      </ul>

      <!--List of navbar items on the right side-->
      <ul class="navbar-nav ml-auto">
        <?php
          //Checks if the user is logged in
          if (session_status() == PHP_SESSION_ACTIVE){
            //Checks if the user is logged in as an admin
            if ($_SESSION['admin']==1){
              //If they are an admin then a link to the admin section is put in the navbar
              echo "<li class='nav-item dropdown'>
                <a class='nav-link p-3 my-2 mx-3' href='index.php?page=adminsection'>Admin</a>
              </li>";
            }
            //If a user is logged in then a link to the cart page of the website is added, and a button which logs out the user
            echo "<li class='nav-item dropdown'>
              <a class='nav-link p-3 my-2 mx-3' href='index.php?page=cart'>Cart</a>
            </li>
            <li class='nav-item dropdown'>
              <a class='nav-link p-3 my-2 mx-3' href='index.php?logout=1'>Logout</a>
            </li>";
          }
          //If a user is not logged in then the only link displayed is a link to the login and sign up page on the website
          else{
            echo "<li class='nav-item dropdown'>
              <a class='nav-link p-3 my-2 mx-3' href='index.php?page=loginsignup'>Login/Sign Up</a>
            </li>";
          }
         ?>
      </ul>
    </div>
  </nav>
</div>

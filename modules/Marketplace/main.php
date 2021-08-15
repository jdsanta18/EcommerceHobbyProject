<?php 
session_start();

include '../../includes/dbConfig.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Marketplace Home</title>
<link href="../MainStylesheet.css" media="all" rel="Stylesheet" type="text/css" />
</head>
  <body>
    
    <script type="text/javascript">
    //Checks if user is logged in  
      <?php
        if($_SESSION['loggedin']){   
          echo 'var isLoggedIn = true';
        }
        else{
          echo 'var isLoggedIn = false';
        }
      ?>
    </script>
    <!-- Navigation bar -->
    <div id ="navbar">
      <div class="left-side">
        <a class="btn" href="../index.php">Back to Homepage</a>
      </div>
      <div class="right-side">
        <a class="btn" href="/Account/signin.html">Sign In</a>
        <a class="btn" href="/Account/register.html">Register</a>
      </div>
    </div>
    
    <!--     -->
    <div id = "catalog-wrapper">
      <div id = "catalog">
        <p class ="title">Games:</p>
        <div class="left-side">
          <p>Filters:</p>
        </div>
        <div class="right-side">
          <?php
            $result = mysqli_query($db, "SELECT * FROM products");
            while($row = mysqli_fetch_assoc($result)){
              echo '<div class="product-card">';
              echo '<img src="' . $row[imgpath]  . '" width=200px height=200px alt="Couldnt Load img">';
              echo '<p>' . $row[name] . '</p>';
              echo '<p>' . $row[platform] . '</p>';
              echo '<p>Price: ' . $row[price] . '£</p>';
              echo '</div>';
            }
          ?>
        </div>
      </div>
    </div>


    <script type="text/javascript">
    //Swaps the Homepage buttons depending on logged in state
      $(document).ready(function(){ 
        if(isLoggedIn){
        $("a:contains('Sign In')").replaceWith("<button id='logout-btn' class='btn'>Log Out</button>");
        $("a:contains('Register')").text("Shopping Cart");
        $("a:contains('Register')").attr("href", "");
        }
      });
    </script>
    
    <script type="text/javascript" src="Account/account_logout.js"></script>

    
  </body>
</html>
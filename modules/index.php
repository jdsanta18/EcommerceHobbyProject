<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Homepage</title>
<script
src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous">
</script>
<link href="MainStylesheet.css" media="all" rel="Stylesheet" type="text/css" />
</head>
<body>

  <?php
  //Destroys session if logout is pressed
  if($_POST[logout_pressed]){
    session_destroy();
    echo("Session was destroyed successfully");
    unset($_POST[logout_pressed]);
  }
  ?>

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
      <a class="btn" href="/Marketplace/main.php">Games</a>
    </div>
    <!-- Welcome banner (if user is logged in)-->
    <div class= "central-block">
      <?php
      if($_SESSION["loggedin"] === true){
        echo "<h1>Welcome " . $_SESSION["first_name"] . "</h1>";
      }
      ?>
    </div>
    <div class="right-side">
      <a class="btn" href="/Account/signin.html">Sign In</a>
      <a class="btn" href="/Account/register.html">Register</a>
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

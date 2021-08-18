<?php 
  session_start();
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
    
    <!-- Catalog Section -->
    <div id = "catalog-wrapper">
      <div id = "catalog">   
        <div class="left-side">
          <h1>Filters:</h1>
          <label for="price">Price below:</label>
          <select name="price" id="price-select">
            <option value="default">Any price</option>
            <option value="9.99">9.99£</option>
            <option value="19.99">19.99£</option>
            <option value="29.99">29.99£</option>
            <option value="39.99">39.99£</option>
            <option value="49.99">49.99£</option>
          </select>
          <br>
          <br>
          <label for="platform">Platform:</label>
          <select name="platform" id="platform-select">
            <option value="default">Any</option>
            <option value="Nintendo Switch">Nintendo Switch</option>
            <option value="Playstation 4">Playstation 4</option>
            <option value="PC">PC</option>
            <option value="Xbox One">Xbox One</option>
          </select>
        </div>
        <div class="right-side">
          <p class ="title">Results:</p>
          <?php
            /*$totalresults = mysqli_query($db, "SELECT * FROM products");
            while($row = mysqli_fetch_assoc($totalresults)){
              echo '<div class="product-card">';
              echo '<img src="' . $row[imgpath]  . '" width=200px height=200px alt="Couldnt Load img">';
              echo '<p>' . $row[name] . '</p>';
              echo '<p>' . $row[platform] . '</p>';
              echo '<p>Price: ' . $row[price] . '£</p>';
              echo '</div>';
            }*/
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
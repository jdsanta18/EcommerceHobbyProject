<?php
    include '../../includes/dbConfig.php';

    $filterquery = null;
    
    if(!isset($_GET['price']) && !isset($_GET['platform'])){
        $filterquery = mysqli_query($db, "SELECT * FROM products");
    }
    else if($_GET['price'] == "default" && $_GET['platform'] == "default"){
        $filterquery = mysqli_query($db, "SELECT * FROM products");
    }
    else if($_GET['price'] != "default" && $_GET['platform'] == "default"){
        $filterquery = mysqli_query($db, "SELECT * FROM products WHERE price < " . $_GET['price']);
    }
    else if($_GET['price'] == "default" && $_GET['platform'] != "default"){
        $filterquery = mysqli_query($db, "SELECT * FROM products WHERE platform = '" . $_GET['platform'] . "'");
    }
    else{
        $filterquery = mysqli_query($db, "SELECT * FROM products WHERE price < " . $_GET['price'] . " AND platform = '" . $_GET['platform'] . "'");   
    }


    function displayCatalog($query){
        while($row = mysqli_fetch_assoc($query)){
            echo '<div class="product-card">';
            echo '<img src="' . $row[imgpath]  . '" width=200px height=200px alt="Couldnt Load img">';
            echo '<p>' . $row[name] . '</p>';
            echo '<p>' . $row[platform] . '</p>';
            echo '<p>Price: ' . $row[price] . '£</p>';
            echo '</div>';
        }
    }
?>
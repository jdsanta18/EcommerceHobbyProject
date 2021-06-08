<?php
require_once "../../includes/dbConfig.php";
session_start();

$email_address = mysqli_real_escape_string($db, $_POST["eaddress"]);
$password = mysqli_real_escape_string($db, $_POST["pword"]);

$email_sql = "SELECT * FROM users WHERE email = '$email_address'";

if(mysqli_num_rows(mysqli_query($db,$email_sql)) > 0){
    $row = mysqli_fetch_assoc(mysqli_query($db, $email_sql));
    if(password_verify($password, $row["password"])){
        $_SESSION["first_name"] = $row["first_name"];
        $_SESSION["loggedin"] = true;
        header("Location: ../index.php"); //TODO: Fix this redirection
        exit();
    }
    else{
        exit($row["first_name"]);
    }	
}
else{
    exit("login failed, wrong credentials!");
}

?>
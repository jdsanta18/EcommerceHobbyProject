<?php
//This adds all the registration parameters to the database
//********************************************************** 

require_once '../../includes/dbConfig.php';


$first_name = mysqli_real_escape_string($db, $_POST['fname']);
$last_name = mysqli_real_escape_string($db, $_POST['lname']);
$email_address = mysqli_real_escape_string($db, $_POST['eaddress']);
$password = mysqli_real_escape_string($db, $_POST['pword']);
$phone_number = mysqli_real_escape_string($db, $_POST['pnumber']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


//Checks if email address is taken
if(isset($_POST['email_check'])){
    $email_valid_query = "SELECT * FROM users WHERE email='$email_address'";
    if(mysqli_num_rows(mysqli_query($db,$email_valid_query)) > 0){
        echo 'taken';	
    }
    else{
        echo 'not_taken';
    }
    mysqli_close($db);
    exit();
}

$sql = "INSERT INTO users(first_name, last_name, phone_number, email, password) VALUES ('$first_name', '$last_name', '$phone_number', '$email_address', '$hashed_password')";


if(mysqli_query($db,$sql)){                       
    $_SESSION['first_name'] = $first_name;
    $_SESSION['loggedin'] = true;
    mysqli_close($db);
    readfile('successful_signup.html');       
    exit();
}
else{
    mysqli_close($db);
    readfile('failed_signup.html'); 
    exit();
}
?>



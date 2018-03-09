<?php

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) 
{
	$_SESSION['message'] = "You must log in before viewing your profile page!";
	header("location: error.php");    
}

$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
$time_stamp = date("Y-m-d H:i:s");

$update = 'UPDATE '. DB .".users SET login_time = '$time_stamp', logged_in = 1 WHERE email =  '$email'";
$mysqli->query($update);

//session_unset();
//session_destroy(); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <div class="form">
  
        <h1>
            You have been checked in 
            <br>
            <?= $first_name.' '.$last_name ?>!
        </h1>
              
        <p>Don't forget to check out when you go.</p>
          
        <a href="main.php"><button class="button button-block">Home</button></a>
        
        <br>
        <br>
        <br>
        <br>
        
        <a href="change_pass_info.php"><button class="button button-block">Change Password?</button></a>

    </div>

</body>

</html>
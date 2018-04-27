<?php

require_once 'db.php';
require_once 'location.php';

if ($_SESSION['logged_in']!= 1 ) 
{
	$_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");
    exit(0);    
} 
else if ($_SESSION['working'])
{
    $_SESSION['message'] = "User already logged in!";
    header("location: error.php");
    exit(0);
}

$id = $_SESSION['id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
$time_stamp = date("Y-m-d H:i:s");

$location = location($_SERVER['REMOTE_ADDR']);

$update = 'UPDATE '. DB .".users SET login_time = '$time_stamp', location = '$location', logged_in = b'1' WHERE email =  '$email'";
$mysqli->query($update);

$update = 'INSERT INTO ' .DB. ".`$id` (`$id`) VALUES ('$time_stamp')";
$mysqli->query($update);

session_destroy(); 

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
          
        <a href="index.html"><button class="button button-block">Home</button></a>
        
    </div>

</body>

</html>
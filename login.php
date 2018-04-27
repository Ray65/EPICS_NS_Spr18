<?php

require_once "db.php";
session_unset();

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email='$email'");
$user = $result->fetch_assoc();

if ($result->num_rows != 1)
{
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
    exit(0);
}

$_SESSION['id']         = $user['id'];
$_SESSION['email']      = $user['email'];
$_SESSION['first_name'] = $user['first_name'];
$_SESSION['last_name']  = $user['last_name'];
$_SESSION['working']    = $user['logged_in'];
$_SESSION['logged_in']  = true;

if($user['admin'])
{    
    header("location: adminlogin.php");
    exit(0);
}
else
{    
    header("location: check_in.php");
    exit(0);
}

?>
<?php

require_once 'db.php';

$id = $_POST["id"];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$user_type = $_POST['user_type'];
$pass = $_POST['pass'];
$location = $_POST['location'];
$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email= '$email'");
$user = $result->fetch_assoc();

if ($result->num_rows!=0) {
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
}

$update = 'INSERT INTO '. DB .".users (id, first_name, last_name, email, password, user_type, location) 
                                VALUES ($id, '$first_name', '$last_name', '$email', '$pass', '$user_type', '$location')";

if ($mysqli->query($update))
{
    $_SESSION['message'] = 'New user added!';
    header("location: success.php"); 
} 
else 
{
    $_SESSION['message'] = 'Registration failed!';
    header("location: error.php"); 
}

?>
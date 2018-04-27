<?php

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
	$_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");    
    exit(0);
}

$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form">

        <h1>Welcome Admin</h1>
        
        <h2><?="$first_name $last_name"?></h2>
        <br>
        <a href="add_new.php"><button class="button button-block" name="add_new">Add New</button></a>
        <br>
        <a href="modify.php"><button class="button button-block" name="modify">Modify</button></a>
        <br>
        <a href="delete.php"><button class="button button-block" name="delete">Delete</button></a>
        <br>
        <a href="view.php"><button class="button button-block" name="view">View</button></a>
        <br>
        <a href="index.html"><button class="button button-block" name="logout">Home</button></a>
        <br>
        

    </div>

</body>

</html>
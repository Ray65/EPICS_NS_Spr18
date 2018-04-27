<?php

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
	$_SESSION['message'] = "You must log in";
    header("location: error.php");  
    exit(0);  
}

$email = $_POST["email"];
$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email='$email'");

if ( $result->num_rows == 0 ) 
{ 

    $_SESSION['message'] = 'User with this email does not exist!';
    header("location: error.php"); 
    exit(0);  
 
}

$user = $result->fetch_assoc();
$id = $user['id'];

//Remove the user from the main table and delete their login table
$update = 'DELETE FROM '. DB .".users WHERE email = '$email'; " .
            'DROP TABLE '. DB . ".`$id`;";

if ($mysqli->multi_query($update))
{
    $_SESSION['message'] = 'User deleted!';
    header("location: success.php"); 
    exit(0);
}
else 
{
    $_SESSION['message'] = 'Deletion failed!';
    header("location: error.php"); 
    exit(0);
}

?>

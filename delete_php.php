<?php

require_once 'db.php';

$email = $_POST["email"];
$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email='$email'");

if ( $result->num_rows == 0 ) 
{ 

    $_SESSION['message'] = 'User with this email does not exist!';
    header("location: error.php");   
 
}

$sql = 'DELETE FROM '. DB .".users WHERE email = '$email'";

if ($mysqli->query($sql))
{
    $_SESSION['message'] = 'User deleted!';
    header("location: success.php"); 
}
else 
{
    $_SESSION['message'] = 'Deletion failed!';
    header("location: error.php"); 
}

?>

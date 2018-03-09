<?php

require_once 'db.php';

/*
if(isset($_POST["first_name"]))
{
    echo $_POST["first_name"];
}

else
{
    echo "fname DNE";
}

if(isset($_POST["last_name"]))
{
    echo $_POST["last_name"];
}

else
{
    echo "lname DNE";
}

if(isset($_SESSION["email"]))
{
    echo $_SESSION["email"];
}

else
{
    echo "email DNE";
}

if(isset($_POST["pass"]))
{
    echo $_POST["pass"];
}

else
{
    echo "pass DNE";
}
 */
 

$email = $_SESSION["email"];

$pass = $_POST["pass"];

$hash_pass = password_hash($pass, PASSWORD_DEFAULT);
//echo $hash_pass;
$sql = 'UPDATE'. DB .".users SET password = '$hash_pass' WHERE email = '$email'";
//echo $mysqli->query($sql);

if ($mysqli->query($sql))
{
    $_SESSION['message'] = 'User modified!';
    header("location: success.php"); 
}
else 
{
    $_SESSION['message'] = 'Update failed!';
    header("location: error.php"); 
    //die(mysqli_error($sql));
}

?>
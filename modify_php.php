<?php

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
	$_SESSION['message'] = "You must log in";
    header("location: error.php");  
    exit(0);  
}

$old_id = $_SESSION["old_id"];
$old_email = $_SESSION["old_email"];
$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$admin = $_POST['admin'];

$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE id= '$id'");

if ($result->num_rows!=0 && $id!=$old_id){
    $_SESSION['message'] = 'User with this id already exists!';
    header("location: error.php");
    exit(0);
}

$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email= '$email'");

if ($result->num_rows!=0 && $email!=$old_email){
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    exit(0);
}

$pass = NULL;

if ($admin)
{
    //Hash the password for storing in the database
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
}

//Update the user information and alter the login table
$update =   'UPDATE '. DB .".users SET 
                                id = '$id', 
                                first_name = '$first_name', 
                                last_name = '$last_name', 
                                email = '$email', 
                                password = '$pass',
                                admin = $admin
                            WHERE email = '$old_email'; " .
            'ALTER TABLE ' . DB . ".`$old_id` RENAME TO " . DB . ".`$id`";

if ($mysqli->multi_query($update))
{
    $_SESSION['message'] = 'User modified!';
    header("location: success.php");
    exit(0); 
}
else 
{
    $_SESSION['message'] = 'Update failed!';
    header("location: error.php"); 
    exit(0);
}

?>
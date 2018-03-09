<?php

require_once "db.php";

//Code to prevent SQL Injection
$email = $mysqli->escape_string($_POST['email']);
//$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email='$email'");
$stmt = $mysqli->prepare('SELECT * FROM '. DB .".users WHERE email= ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1){
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}

$user = $result->fetch_assoc();
$entered_pass = $_POST['pass'];
if($user['logged_in']){
    $_SESSION['message'] = "User already logged in!";
    header("location: error.php");
}
else if($user['user_type']=="admin")
{    
    if((password_verify($entered_pass, $user["password"])) or ($entered_pass == $user["password"]))
    {
        $_SESSION['email'] = $user['email'];
        $curr_email = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['logged_in'] = true;

        header("location: adminlogin.php");
    }
    else
    {
        $_SESSION['message'] = "Incorrect Password!";
        header("location: error.php");
        //die("Incorrect Password!");
    }
}
else if($user['user_type']=="user")
{    
    if((password_verify($entered_pass, $user["password"])) or ($entered_pass == $user["password"]))
    {
        $_SESSION['email'] = $user['email'];
        $curr_email = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['logged_in'] = true;

        header("location: check_in.php");
    }
    else
    {
        $_SESSION['message'] = "Incorrect Password!";
        header("location: error.php");
        //die("Incorrect Password!");
    }
}

?>
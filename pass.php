<?php

    require_once 'db.php';
    $pass = $_POST['pass'];
    $update = 'SELECT password FROM '. DB . ".users WHERE email='". $_SESSION['email'] . "';";
    $result = $mysqli->query($update);
    $dbpass = $result->fetch_assoc();

    //Verify the hashed password
    if(password_verify($pass, $dbpass['password']))
    {
        header("location: adminpage.php");
        exit(0);
    } 
    else
    {
        session_unset();
        $_SESSION['message'] = 'Incorrect password!';
        header("location: error.php");
        exit(0);
    }

?>
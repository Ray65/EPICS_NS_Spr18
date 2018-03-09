﻿<?php 

require_once 'db.php';
session_unset();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Hub</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form">

        <div id="login">
            
            <h1>Welcome Back!</h1>

            <form action="login.php" method="post" autocomplete="off">

                <div class="field-wrap">
                
                    <input type="email" autocomplete="off" name="email" placeholder="Email Address" required>
                    
                </div>
                
                <div class="field-wrap">
                
                    
                    <input type="password" autocomplete="off" name="pass" placeholder="Password" required>
                </div>

                <button class="button button-block" name="login">Check In</button>

            </form>

        </div>

        <br>
        <br>
        <hr>
        <br>
        
        <h1>Leaving?</h1>
        
        <a href="checkout.php"><button class="button button-block" name="checkout">Check Out</button></a>
        
    </div>
    

</body>

</html>

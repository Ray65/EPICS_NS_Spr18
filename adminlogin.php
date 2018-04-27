<?php 

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");   
    exit(0); 
}

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
    
        <div id="login">
            
            <h1>Go to the admin page</h1>

            <form action="pass.php" method="post" autocomplete="off">

                <div class="field-wrap">
                
                    <input type="password" style="max-height: 38px;" autocomplete="off" name="pass" placeholder="Password" required>
                    
                </div>
            
                <button class="button button-block" name="login">Admin Page</button>

            </form>

        </div>

        <br>
        <hr>
        <br>

        <h1>Or</h1>
        
        <a href="check_in.php"><button class="button button-block" name="checkin">Check In</button></a>

    </div>
    

</body>

</html>

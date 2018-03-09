<?php 

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
	$_SESSION['message'] = "You must log in";
	header("location: error.php");    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <div class="form">

        <div id="modify">
    
            <h1>Change Password!</h1>

            <form action="change_pass_info.php" method="post" autocomplete="off">
            
                <div class="field-wrap">                
                    <input type="email" autocomplete="off" name="email" placeholder="Please re-enter your email address" required >
                </div>

                <button class="button button-block" name="change_pass">Change</button>

            </form>

        </div>

        <hr>
        <a href="check_in.php"><button class="button button-block" name="back">Back</button></a>
        
    </div>

</body>

</html>


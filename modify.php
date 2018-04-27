<?php 

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
	$_SESSION['message'] = "You must log in";
    header("location: error.php");   
    exit(0); 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify user</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <div class="form">

        <div id="modify">
    
            <h1>Modify User!</h1>

            <form action="change_info.php" method="post" autocomplete="off">
            
                <div class="field-wrap">                
                    <input type="email" autocomplete="off" name="email" placeholder="Enter the email address" required >
                </div>

                <button class="button button-block" name="modify_user">Modify</button>

            </form>

        </div>

        <hr>
        <a href="adminpage.php"><button class="button button-block" name="back">Back</button></a>
        
    </div>

</body>

</html>

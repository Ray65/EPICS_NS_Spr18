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
    <title>Delete User</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    
    <div class="form">

        <div id="delete">
            
            <h1>Delete User!</h1>

            <form action="delete_php.php" method="post" autocomplete="off">
                
                <div class="field-wrap">
                    <input type="email" autocomplete="off" name="email" placeholder="Email of the user to delete" required>
                </div>

                <button class="button button-block" name="delete_user">Delete</button>

            </form>

        </div>

        <hr>
        <a href="adminpage.php"><button class="button button-block" name="back">Back</button></a>
        
    </div>

</body>

</html>

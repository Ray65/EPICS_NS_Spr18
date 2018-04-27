<?php

require_once 'db.php';

$success = "Success";
if(isset($_SESSION['message']))
{  
   $success = $_SESSION['message'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <div class="form">
        
        <h1>Success</h1>
        
        <p><?=$success?></p>
        
        <a href="adminpage.php"><button class="button button-block">Admin Home</button></a>
    
    </div>

</body>

</html>

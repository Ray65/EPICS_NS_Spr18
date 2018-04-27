<?php

require_once 'db.php';

$error = "Unexpected Error";
if(isset($_SESSION['message']))
{  
    $error = $_SESSION['message'];   
}

session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <div class="form">
        
        <h1>Error</h1>
    
        <p><?=$error?></p>
        
        <a href="index.html"><button class="button button-block">Home</button></a>
    
    </div>
    
</body>

</html>

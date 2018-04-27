<?php

require_once "db.php";
session_unset();

$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE logged_in=b'1'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form">

        <h1>Current Users</h1>
        <form action="checkout_php.php" method="post">
        
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $output = '<input class = "button button-block" type="submit" value="'. $row['first_name'] . ' ' . $row['last_name'] . '" name="' . $row['id']. '">';
                    echo $output;
                }
            }
        ?>
              
        </form>
        <br>
        <hr>
        <br>
        <a href="index.html"><button class="button button-block">Back</button></a>
        
    </div>

</body>

</html>
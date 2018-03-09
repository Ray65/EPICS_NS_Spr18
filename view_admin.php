<?php

require_once "db.php";

$result = $mysqli->query('SELECT id, first_name, last_name, email, user_type, hours, location FROM '. DB .'.users');

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

        <h1>Admins</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Hours</th>
                <th>Location</th>
            </tr>
            <?php
                
                while($row = $result->fetch_assoc()) {
                    if ($row['user_type']=='user'){
                        continue;
                    }
                    echo "<tr>";
                    $output = "<td>$row[id]</td><td>$row[first_name] $row[last_name]</td><td>$row[email]</td><td>$row[hours]</td><td>$row[location]</td>";
                    echo $output;
                    echo "</tr>";
                }
            ?>
        </table>
                
        <br>
        <br>
        <a href="adminlogin.php"><button class="button button-block" name="back">Back</button></a>
        
    </div>


</body>

</html>
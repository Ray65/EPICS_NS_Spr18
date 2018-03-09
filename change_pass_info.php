<?php 

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");    
}

$email = $_SESSION["email"];
$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email='$email'");
$user = $result->fetch_assoc();

$old_pass = $user["password"];
$first_name = $user["first_name"];
$last_name = $user["last_name"];
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

        <div id="change">
            <h1>Modify password for
                <br>
                <?=$first_name . " " . $last_name?>
            </h1>

            <form action="change_pass_php.php" method="post" autocomplete="off">

                <div class="field-wrap">
                   
                    <input type="text" autocomplete="off" name="pass" placeholder="Please enter your new password" required>
                </div>

                

                <button class="button button-block" name="change_pass_info">Change</button>

            </form>

        </div>

        <hr>
        <a href="change_pass.php">
            <button class="button button-block" name="back">Back</button>
        </a>

    </div>

</body>

</html>
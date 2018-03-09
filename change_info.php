<?php 

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");    
}

$email = $_POST["email"];
$_SESSION["old_email"]=$email;
$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email='$email'");
$user = $result->fetch_assoc();
$id = $user["id"];
$first_name = $user["first_name"];
$last_name = $user["last_name"];
$user_type = $user["user_type"];
$location = $user["location"];

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

        <div id="change">
            <h1>Modify details for
                <br>
                <?=$first_name . " " . $last_name?>
            </h1>

            <form action="modify_php.php" method="post" autocomplete="off">

                <div class="field-wrap">
                    <input type="number" autocomplete="off" name="id" value=<?="$id" ?> required>
                </div>

                <div class="field-wrap">
                    <input type="text" autocomplete="off" name="first_name" value=<?="$first_name" ?> required>
                </div>

                <div class="field-wrap">
                    <input type="text" autocomplete="off" name="last_name" value=<?="$last_name" ?> required>
                </div>

                <div class="field-wrap">
                    <input type="email" autocomplete="off" name="email" value=<?="$email" ?> required>
                </div>

                <div class="field-wrap">
                    <input type="text" autocomplete="off" name="user_type" value=<?="$user_type" ?> required>
                </div>
                
                <div class="field-wrap">
                                       
                    <input type="text" autocomplete="on" name="location" value=<?="$location" ?> >
                    
                    
                </div>

                <button class="button button-block" name="change_info">Change</button>

            </form>

        </div>

        <hr>
        <a href="modify.php">
            <button class="button button-block" name="back">Back</button>
        </a>

    </div>

</body>

</html>
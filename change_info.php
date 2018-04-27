<?php 

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");   
    exit(0); 
}

$email = $_POST["email"];
$_SESSION["old_email"]=$email;

//Get the current user data from the table
$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email='$email'");
$user = $result->fetch_assoc();
$id = $user["id"];
$_SESSION['old_id']=$id;
$first_name = $user["first_name"];
$last_name = $user["last_name"];
$admin = $user["admin"];

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

<script>
function openTab(evt, content) {
    
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tab" and remove the class "active"
    tab = document.getElementsByClassName("tab");
    for (i = 0; i < tab.length; i++) {
        tab[i].className = tab[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(content).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

    <div class="form">

        <ul class="tab-group">
            <li class="tab" onclick="openTab(event, 'admin')">Admin</li>
            <li class="tab active" onclick="openTab(event, 'user')">User</li>
        </ul>   

        <h1>Modify details for
                <br>
                <?=$first_name . " " . $last_name?>
        </h1>

        <div id="admin" class="tabcontent" style="display: none">

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
                    <input type="text" autocomplete="off" name="password" placeholder="Password" required>
                </div>

                <button class="button button-block" name="admin" value="1">Modify to Admin</button>

            </form>

        </div>

        <div id="user" class="tabcontent">

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
                    <input type="email" autocomplete="off" name="email" value=<?="$email"?> required>
                </div>

                <button class="button button-block" name="admin" value="0">Modify to User</button>

            </form>

        </div>

        <hr>
        <a href="adminpage.php">
            <button class="button button-block" name="back">Back</button>
        </a>

    </div>

</body>

</html>
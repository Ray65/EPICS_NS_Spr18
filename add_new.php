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
    <title>Add new user</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    
    <script>
        function openTab(evt, content) {
            
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
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

        <div id="admin" class="tab-content" style="display: none">

            <h1>Add New Admin!</h1>

            <form action="add_new_php.php" method="post" autocomplete="off">

                <div class="field-wrap">
                    <input type="number" autocomplete="off" name="id" placeholder="ID" required>
                </div>

                <div class="field-wrap">
                    <input type="text" autocomplete="off" name="first_name" placeholder="First Name" required>
                </div>

                <div class="field-wrap">
                    <input type="text" autocomplete="off" name="last_name" placeholder="Last Name" required>
                </div>

                <div class="field-wrap">
                    <input type="email" autocomplete="off" name="email" placeholder="Email Address" required>
                </div>

                <div class="field-wrap">
                    <input type="text" autocomplete="off" name="password" placeholder="Password" required>
                </div>

                <button class="button button-block" name="admin" value=1>Add Admin</button>

            </form>

        </div>

        <div id="user" class="tab-content">

            <h1>Add New User!</h1>

            <form action="add_new_php.php" method="post" autocomplete="off">

                <div class="field-wrap">
                    <input type="number" autocomplete="off" name="id" placeholder="ID" required>
                </div>

                <div class="field-wrap">
                    <input type="text" autocomplete="off" name="first_name" placeholder="First Name" required>
                </div>

                <div class="field-wrap">
                    <input type="text" autocomplete="off" name="last_name" placeholder="Last Name" required>
                </div>

                <div class="field-wrap">
                    <input type="email" autocomplete="off" name="email" placeholder="Email Address" required>
                </div>

                <button class="button button-block" name="admin" value=0>Add User</button>

            </form>

        </div>

        <hr>
        <a href="adminpage.php">
            <button class="button button-block" name="back">Back</button>
        </a>

    </div>

</body>

</html>
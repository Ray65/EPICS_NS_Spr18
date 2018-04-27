<?php

require_once "db.php";

if ( $_SESSION['logged_in'] != 1 ) {
	$_SESSION['message'] = "You must log in";
    header("location: error.php");  
    exit(0);  
}

$result = $mysqli->query('SELECT * FROM '. DB .'.users');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=100px, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="transform: scale(1.0);">
    
    <script>

        //The following sorting script came from w3schools
        //https://www.w3schools.com/howto/howto_js_sort_table.asp

        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("users");
            switching = true;
            // Set the sorting direction to ascending:
            dir = "asc";
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.getElementsByTagName("TR");
                /* Loop through all table rows (except the
                first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                    // Start by saying there should be no switching:
                    shouldSwitch = false;
                    /* Get the two elements you want to compare,
                    one from current row and one from the next: */
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /* Check if the two rows should switch place,
                    based on the direction, asc or desc: */
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /* If a switch has been marked, make the switch
                    and mark that a switch has been done: */
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    // Each time a switch is done, increase this count by 1:
                    switchcount++;
                } else {
                    /* If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again. */
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>

    <div class="form">

        <h1>Users</h1>
        <table id="users">

            <tr>
                <th id="id" onclick="sortTable(0)">ID</th>
                <th id="name" onclick="sortTable(1)">Name</th>
                <th id="email" onclick="sortTable(2)">Email</th>
                <th id="hours" onclick="sortTable(3)">Hours</th>
                <!--<th>Location</th>
                <td>$row[location]</td>-->
            </tr>
            <?php
                
                while($row = $result->fetch_assoc()) {
                    /*if ($row['admin']){
                        continue;
                    }*/
                    echo "<tr>";
                    $output = "<td>$row[id]</td><td>$row[first_name] $row[last_name]</td><td>$row[email]</td><td>$row[hours]</td>";
                    echo $output;
                    echo "</tr>";
                }
                
            ?>
        </table>
                
        <br>
        <br>
        <a href="adminpage.php"><button class="button button-block" name="back">Back</button></a>
        
    </div>

</body>

</html>

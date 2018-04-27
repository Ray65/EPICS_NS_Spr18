<?php

require_once 'db.php';

$id = key($_POST);

$results = $mysqli->query('SELECT hours, minutes FROM '. DB .".users WHERE id = '$id'")->fetch_assoc();
$hours = $results['hours'];
$minutes = $results['minutes'];

if ($hours == NULL){
    $hours = 0;
}

if ($minutes == NULL){
    $minutes = 0;
}

//Create a date from their original login time
$results = $mysqli->query('SELECT login_time FROM '. DB .".users WHERE id = '$id'")->fetch_assoc();
$old = date_create($results['login_time']);

//Create a date from the current time
$time_stamp = date("Y-m-d H:i:s", time());
$curr = date_create($time_stamp);

//Calculate the difference
$diff = date_diff($old, $curr);

//Calculate the number of hours worked
if ($diff->i+$minutes>=60){
    $minutes = $diff->i + $minutes - 60;
    $hours = $hours + 1;
} else {
    $minutes = $minutes + $diff->i;
}

$hours = $hours + $diff->h;

//Update the user hours in the table
$update = 'UPDATE '. DB .".users SET logged_in = b'0', hours = $hours, minutes = $minutes WHERE id =  '$id'";
$mysqli->query($update);

$_SESSION['hours']= $diff;
header ("Location: logout.php");
exit(0);

?>
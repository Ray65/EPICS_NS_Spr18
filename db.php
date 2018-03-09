<?php

session_start();
date_default_timezone_set ("America/New_York");

define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','accounts');

$mysqli = new mysqli(HOST,USER,PASS,DB) or die($mysqli->error);

?>
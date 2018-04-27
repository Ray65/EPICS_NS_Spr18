<?php

//Starts the session which will be used to keep track of variables between pages
session_start();
date_default_timezone_set ("America/New_York");

define('HOST','<localhost>');
define('USER','<USERNAME>');
define('PASS','<PASSWORD>');
define('DB','<DBNAME>');

$mysqli = new mysqli(HOST,USER,PASS,DB) or die($mysqli->error);

?>
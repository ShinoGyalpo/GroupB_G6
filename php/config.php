<?php

session_start(); // will start all the session

//creating constants to store localhost, roor, password and database
define('LOCALHOST','localhost:3307');
define('ROOT','root');
define('PASSWORD','');
define('DATABASE','login_db');
define('SITEURL','http://localhost/GroupB_G6-main/');

$conn = mysqli_connect(LOCALHOST, ROOT, PASSWORD, DATABASE) or die(mysqli_error('Failed to connect!'));
$db_select = mysqli_select_db($conn, DATABASE) or die(mysqli_error('Failed to select database!'))
?>


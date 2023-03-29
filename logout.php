<?php
session_start(); //start session
session_destroy(); // distroy all the current sessions
$url = 'index.html';
header('Location: ' . $url); // redireted to login page

?>
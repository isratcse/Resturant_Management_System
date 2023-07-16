<?php
include 'connect.php';
//destroy the session
session_destroy();

//redirect the login page

header("Location: http://localhost/restaurant-project/admin/login.php/");
?>
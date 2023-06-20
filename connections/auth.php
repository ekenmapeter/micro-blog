<?php
include '../connections/connectDB.php';

session_start();




// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to the login page
    header("Location: ../login.php");
    exit();
}

// User is logged in, you can access the user information from the session variables
$username = $_SESSION['username'];
$fullname = $_SESSION['fullname'];
$email = $_SESSION['email'];

// Rest of your dashboard code goes here
?>
<?php
session_start();

// Database configuration
include 'connectDB.php';

// Establish database connection using PDO
if(isset($_POST['submit']))
{
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validate form data
    if (empty($username) || empty($fullname) || empty($email) || empty($password)) {
        // Handle empty fields error
        echo "Error: Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email error
        echo "Error: Invalid email address.";
    } else {
        // Insert user data into the database using prepared statement
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, fullname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $fullname, $email, $password]);

            // Registration successful, store session data
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;

            // Redirect to the user dashboard
            header("Location: ../user/dashboard.php");
            exit();
        } catch (PDOException $e) {
            // Registration failed
            echo "Error: " . $e->getMessage();
        }
        }
    }
}

?>
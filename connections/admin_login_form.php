<?php
// Database configuration
require 'connectDB.php';

// Establish database connection using PDO
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
    $password = $_POST['password']; // No need to sanitize password

    // Retrieve admin data from the database
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the admin exists and verify the password
    if ($admin && password_verify($password, $admin['password'])) {
        // Start a session and store admin information
        session_start();
        $_SESSION['username'] = $admin['username'];
        $_SESSION['fullname'] = $admin['fullname'];
        $_SESSION['email'] = $admin['email'];

        // Redirect to the admin dashboard
        header("Location: ../admin-dashboard/dashboard.php");
        exit();
    } else {
        // Invalid username or password
        echo "Error: Invalid username or password.";
    }
} else {
    // Redirect to the login page if the form is not submitted
    header("Location: ../login.php");
    exit();
}
?>

<?php
// Database configuration
include 'connectDB.php';

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

    // Retrieve user data from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists and verify the password
    if ($user && password_verify($password, $user['password'])) {
        // Start a session and store user information
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];

        // Redirect to the user dashboard
        header("Location: ../user/dashboard.php");
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

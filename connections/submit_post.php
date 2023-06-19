<?php
// Get form data
$title = $_POST['title'];
$category_id = $_POST['category'];
$description = $_POST['description'];
$url = $_POST['url'];
$urlToImage = $_POST['image'];
$content = $_POST['content'];
$status = 1; // Set default status
$source = "Micro Blog"; // Initialize empty Source
$publishedAt = date('Y-m-d H:i:s'); // Initialize empty Published At

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "micro_blog_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query based on category
if ($category_id == "Entertainment") {
    $stmt = $conn->prepare("INSERT INTO entertainment_articles (id, title, description, url, content, status, urlToImage, source, publishedAt) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
    $categoryTable = "Entertainment News";
} elseif ($category_id == "Business") {
    $stmt = $conn->prepare("INSERT INTO business_articles (id, title, description, url, content, status, urlToImage, source, publishedAt) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
    $categoryTable = "Business News";
} elseif ($category_id == "Sport News") {
    $stmt = $conn->prepare("INSERT INTO sport_articles (id, title, description, url, content, status, urlToImage, source, publishedAt) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
    $categoryTable = "Sport News";
} elseif ($category_id == "World News") {
    $stmt = $conn->prepare("INSERT INTO world_articles (id, title, description, url, content, status, urlToImage, source, publishedAt) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
    $categoryTable = "World News";
} else {
    echo "Invalid category.";
    exit;
}

$stmt->bind_param("ssssssss", $title, $description, $url, $content, $status, $urlToImage, $source, $publishedAt);

if ($stmt->execute()) {
    $message = "Post submitted successfully into the category: " . $categoryTable;
    echo "<script>alert('$message'); window.location.href='../admin-dashboard/create-post.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

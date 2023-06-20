<?php
session_start(); // Start the session
include '../connections/connectDB.php';

// Get form data
$title = $_POST['title'];
$category_id = $_POST['category'];
$description = $_POST['description'];
$url = $_POST['url'];
$urlToImage = $_POST['image'];
$content = $_POST['content'];
$status = 0; // Set default status
$source = "Micro Blog"; // Initialize empty Source
$publishedAt = date('Y-m-d H:i:s'); // Initialize empty Published At

try {
    // Prepare and execute the SQL query based on category
    if ($category_id == "entertainment") {
        $stmt = $pdo->prepare("INSERT INTO entertainment_articles (title, description, url, content, status, urlToImage, source, publishedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2 = $pdo->prepare("INSERT INTO user_posts (user_id, post_id, username, post_category) VALUES (?, ?, ?, ?)");
        $categoryTable = "entertainment";
    } elseif ($category_id == "business") {
        $stmt = $pdo->prepare("INSERT INTO business_articles (title, description, url, content, status, urlToImage, source, publishedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2 = $pdo->prepare("INSERT INTO user_posts (user_id, post_id, username, post_category) VALUES (?, ?, ?, ?)");
        $categoryTable = "business";
    } elseif ($category_id == "sport") {
        $stmt = $pdo->prepare("INSERT INTO sport_articles (title, description, url, content, status, urlToImage, source, publishedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2 = $pdo->prepare("INSERT INTO user_posts (user_id, post_id, username, post_category) VALUES (?, ?, ?, ?)");
        $categoryTable = "sport";
    } elseif ($category_id == "world") {
        $stmt = $pdo->prepare("INSERT INTO world_articles (title, description, url, content, status, urlToImage, source, publishedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2 = $pdo->prepare("INSERT INTO user_posts (user_id, post_id, username, post_category) VALUES (?, ?, ?, ?)");
        $categoryTable = "world";
    } else {
        echo "Invalid category.";
        exit;
    }

    // Assuming you have retrieved the user ID and other values for user_posts
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username']; // Replace with the actual username

    $stmt->bindParam(1, $title);
    $stmt->bindParam(2, $description);
    $stmt->bindParam(3, $url);
    $stmt->bindParam(4, $content);
    $stmt->bindParam(5, $status);
    $stmt->bindParam(6, $urlToImage);
    $stmt->bindParam(7, $source);
    $stmt->bindParam(8, $publishedAt);

    $stmt2->bindParam(1, $user_id);
    $stmt2->bindParam(2, $post_id);
    $stmt2->bindParam(3, $username);
    $post_category = $categoryTable; // Assign the value of $categoryTable to $post_category
    $stmt2->bindParam(4, $post_category);

    // Insert the post into the corresponding table
    if ($stmt->execute()) {
        $post_id = $pdo->lastInsertId(); // Retrieve the last inserted ID (post ID)

        // Insert the user post into user_posts table
        if ($stmt2->execute()) {
            $message = "Post submitted successfully into the category: " . $categoryTable;
            echo "<script>alert('$message'); window.location.href='../user/create-user-post.php';</script>";
        } else {
            echo "Error: " . $stmt2->errorInfo()[2];
        }
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

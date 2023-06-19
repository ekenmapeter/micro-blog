<?php
// Retrieve the new articles count from the database
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'micro_blog_db';

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Retrieve the new articles count
$result = $conn->query('SELECT COUNT(*) AS newArticlesCount FROM entertainment_articles WHERE status = 0');

// Fetch the count value
$row = $result->fetch_assoc();
$newArticlesCount = $row['newArticlesCount'];

// Close the result
$result->close();

// Check if the refresh button was clicked
if (isset($_POST['refresh'])) {
    // Array of API endpoints and their corresponding category names
    $endpoint = 'https://newsapi.org/v2/top-headlines?country=us&category=entertainment&apiKey=900bd2191c254d00b5650a6741cf2b16';
    $category = 'Entertainment';

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Micro Blog'); // Set your desired User-Agent header value

    // Execute the cURL request
    $response = curl_exec($ch);
    $data = json_decode($response, true);

    // Check if API request was successful
    if ($data['status'] === 'ok') {
        // Access the articles
        $articles = $data['articles'];

        // Store articles in the database
        // Prepare and bind a statement for inserting articles
        $stmtArticles = $conn->prepare('INSERT INTO entertainment_articles (title, description, url, content, urlToImage, source, publishedAt, category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

        // Prepare and bind a statement for inserting categories
        $stmtCategories = $conn->prepare('INSERT INTO categories (name) VALUES (?)');

        // Count of new articles added
        $newArticlesCount = 0;

        // Bind parameters and execute the statements for each article
        foreach ($articles as $article) {
            // Check if article already exists in the database
            $checkStmt = $conn->prepare('SELECT COUNT(*) FROM entertainment_articles WHERE title = ?');
            $checkStmt->bind_param('s', $article['title']);
            $checkStmt->execute();
            $checkStmt->bind_result($count);
            $checkStmt->fetch();
            $checkStmt->close();

            if ($count == 0) {
                // Article does not exist, insert it into the database
                $stmtArticles->bind_param('sssssssi', $article['title'], $article['description'], $article['url'], $article['content'], $article['urlToImage'], $article['source']['name'], $article['publishedAt'], $newCategoryId);
                $stmtArticles->execute();
                $newArticlesCount++;
            }
        }

        // Close the article statement
        $stmtArticles->close();

        // Check if category already exists in the database
        $checkCategoryStmt = $conn->prepare('SELECT id FROM categories WHERE name = ?');
        $checkCategoryStmt->bind_param('s', $category);
        $checkCategoryStmt->execute();
        $checkCategoryStmt->bind_result($categoryId);
        $checkCategoryStmt->fetch();
        $checkCategoryStmt->close();

        if ($categoryId) {
            // Category already exists, reuse the existing category ID
            $newCategoryId = $categoryId;
        } else {
            // Category does not exist, insert it into the database
            $stmtCategories->bind_param('s', $category);
            $stmtCategories->execute();
            $newCategoryId = $stmtCategories->insert_id;
        }

        // Close the category statement
        $stmtCategories->close();
    }

    // Close the cURL handle
    curl_close($ch);
}



?>
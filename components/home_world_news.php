<?php
include './connections/connectDB.php';


// Establish database connection using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Retrieve business articles from the database
try {
    $stmt = $pdo->query("SELECT 
        id,
        title,
        source,
        url,
        urlToImage,
        status,
        publishedAt
    FROM world_articles
    WHERE status = 1
    ORDER BY publishedAt DESC
    LIMIT 6");

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='grid-1 border'>
                <img src='{$row['urlToImage']}' alt='Article Image' width='161px' height='108px'>
                <div>
                <a href='{$row['url']}'><h2 class='blog-title'>{$row['title']}</h2></a>
                <a class='read-more' href='{$row['url']}'>Read more</a>
                </div>
                </div>";
        }
    } else {
        echo "<tr><td colspan='7'>No results found</td></tr>";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

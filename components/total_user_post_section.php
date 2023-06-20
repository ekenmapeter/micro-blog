<?php
include '../connections/connectDB.php';

// Retrieve the user_id from the session or wherever it's stored
$user_id = $_SESSION['user_id'];

try {
    // Retrieve the total number of posts for each post category by the session user_id
    $query_total_posts_by_category = "
        SELECT
            (SELECT COUNT(*) FROM user_posts WHERE user_id = :user_id AND post_category = 'business') AS total_business_posts,
            (SELECT COUNT(*) FROM user_posts WHERE user_id = :user_id AND post_category = 'entertainment') AS total_entertainment_posts,
            (SELECT COUNT(*) FROM user_posts WHERE user_id = :user_id AND post_category = 'sport') AS total_sport_posts,
            (SELECT COUNT(*) FROM user_posts WHERE user_id = :user_id AND post_category = 'world') AS total_world_posts
    ";

    $stmt_total_posts_by_category = $pdo->prepare($query_total_posts_by_category);
    $stmt_total_posts_by_category->bindParam(':user_id', $user_id);
    $stmt_total_posts_by_category->execute();
    $row_total_posts_by_category = $stmt_total_posts_by_category->fetch(PDO::FETCH_ASSOC);

    // Get the total number of posts across all categories
    $total_business_posts = $row_total_posts_by_category['total_business_posts'];
    $total_entertainment_posts = $row_total_posts_by_category['total_entertainment_posts'];
    $total_sport_posts = $row_total_posts_by_category['total_sport_posts'];
    $total_world_posts = $row_total_posts_by_category['total_world_posts'];

    $total_posts = $total_business_posts + $total_entertainment_posts + $total_sport_posts + $total_world_posts;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Total Users Post</title>
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .column {
            flex: 50%;
            padding: 10px;
        }

        .card {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="column">
            <div class="card">
                <h3>Business Post</h3>
                <p><?php echo $total_business_posts; ?></p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Entertainment Post</h3>
                <p><?php echo $total_entertainment_posts; ?></p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Sport Post</h3>
                <p><?php echo $total_sport_posts; ?></p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>World Post</h3>
                <p><?php echo $total_world_posts; ?></p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Total Posts</h3>
                <p><?php echo $total_posts; ?></p>
            </div>
        </div>
    </div>
</body>
</html>

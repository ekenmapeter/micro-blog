<?php
include '../connections/auth.php';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form is submitted
        // Update the status of the table based on ID
        if (isset($_GET['action']) && $_GET['action'] === 'publish' && isset($_GET['id'])) {
            $id = $_GET['id'];

            // Prepare the update statement
            $stmt = $pdo->prepare("UPDATE entertainment_articles SET status = 1 WHERE id = :id");

            // Bind the ID parameter
            $stmt->bindParam(':id', $id);

            // Execute the update statement
            $stmt->execute();

            // Get the title of the updated article
            $titleStmt = $pdo->prepare("SELECT title FROM entertainment_articles WHERE id = :id");
            $titleStmt->bindParam(':id', $id);
            $titleStmt->execute();
            $article = $titleStmt->fetch(PDO::FETCH_ASSOC);

            
        }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>




<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - MicroBlog</title>
    <link rel="stylesheet" type="text/css" href="../css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../css/footer.css" />
    <link rel="stylesheet" type="text/css" href="../css/blog.css" />
    <link rel="stylesheet" type="text/css" href="../css/auth.css" />
    <link rel="stylesheet" type="text/css" href="../css/user.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <?php include '../components/admin-navbar.php'; ?>
    <?php include '../connections/entertainment_api.php'; ?>
    <div class="space-up">
        <div class="container" style="margin-top: 12px;">
            <h2 style="margin-bottom: 6px;">View Category </h2>
            <div class="row ">
                <a href="sports_section.php" class="read-more column button pad" style="padding: 14px;">Sport News</a>
                <a href="entertainment_section.php" class="read-more column button pad" style="padding: 14px;">Entertainment News</a>
                <a href="business_section.php" class="read-more column button pad" style="padding: 14px;">Business News</a>
                <a href="world_section.php" class="read-more column button pad" style="padding: 14px;">World News</a>
            </div>
        </div>

        <div class="table-wrapper">
            <div class="container row">
                <h2>Entertainment News Posts</h2>
                <p style="padding-left:8px; padding-right: 18px;">New articles added: <?php echo $newArticlesCount; ?></p>
                <form method="post">
                    <button type="submit" class="published" name="refresh">Refresh Articles</button>
                </form>
            </div>

            <?php if (isset($article) && $article['title']): ?>
                <div class="notification">
                    <span class="notification-text"><?php echo "{$article['title']} has been published."; ?></span>
                </div>
            <?php endif; ?>

            <table class="fl-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Source</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Date / Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $result = $conn->query("SELECT 
                            id,
                            title,
                            source,
                            status,
                            publishedAt
                        FROM entertainment_articles");

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td class='id-column'>{$row['id']}</td>
                                    <td>{$row['title']}</td>
                                    <td>{$row['source']}</td>
                                    <td>Sport News</td>
                                    <td>";
                                if ($row['status'] == 0) {
                                    echo '<button class="unpublished">Pending</button>';
                                } else {
                                    echo '<button class="published">Published</button>';
                                }
                                echo "</td>
                                    <td>{$row['publishedAt']}</td>
                                    <td>";
                                if ($row['status'] == 0) {
                                        echo '<a href="?action=publish&id=' . $row['id'] . '" class="pending">Publish</a>';
                                    } else {
                                        echo '<a href="#" class="published">Published</a>';
                                    }
                                echo "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No results found</td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>

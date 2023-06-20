<?php include './connections/connectDB.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Business News - Get the latest business news around the world.</title>
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/blog.css" />
    <link rel="stylesheet" type="text/css" href="css/user.css" />
</head>
<body>
    <?php include 'components/navbar.php'; ?>
    <div class="space-up container">
        <div>
            <div style="padding: 4px;">
                <p class="blog-section-header">Business News</p>
            </div>
            <div class="grid-2" style="padding: 4px;">
                
            <?php
            try {
                $pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
            
            // Pagination variables
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $resultsPerPage = 12;
            $offset = ($page - 1) * $resultsPerPage;
            
            // Retrieve total number of rows
            $totalRowsQuery = "SELECT COUNT(*) AS total FROM business_articles WHERE status = 1";
            $totalRowsResult = $pdo->query($totalRowsQuery);
            $totalRows = $totalRowsResult->fetch(PDO::FETCH_ASSOC)['total'];
            
            // Calculate total number of pages
            $totalPages = ceil($totalRows / $resultsPerPage);
            
            // Retrieve articles for the current page
            $query = "SELECT 
                        id,
                        title,
                        source,
                        url,
                        urlToImage,
                        status,
                        publishedAt
                    FROM business_articles
                    WHERE status = 1
                    ORDER BY publishedAt DESC
                    LIMIT $resultsPerPage OFFSET $offset";
            $result = $pdo->query($query);
            
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='grid-1 border'>
                        <img src='{$row['urlToImage']}' alt='Article Image' width='161px' height='108px'>
                        <div>
                            <a href='{$row['url']}'><h2 class='blog-title'>{$row['title']}</h2></a>
                            <a class='read-more' href='{$row['url']}'>Read more</a>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>No results found</p>";
            }
            ?>
            
            </div>
        </div>
        <div class='container'>
            <ul class='pagination'>
                <?php
                // Pagination links
                if ($totalPages > 1) {
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $activeClass = ($i == $page) ? 'active' : '';
                        echo "<li><a class='$activeClass' href='?page=$i'>$i</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
</body>
</html>

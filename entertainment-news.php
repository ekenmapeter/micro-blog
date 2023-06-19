<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Entertainment News - Get the latest enetertainment news around the world.</title>
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
                <p class="blog-section-header">Entertainment News</p>
            </div>
            <div class="grid-2" style="padding: 4px;">
                
          <?php
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

// Pagination variables
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$resultsPerPage = 12;
$offset = ($page - 1) * $resultsPerPage;

// Retrieve total number of rows
$totalRowsQuery = "SELECT COUNT(*) AS total FROM entertainment_articles";
$totalRowsResult = $conn->query($totalRowsQuery);
$totalRows = $totalRowsResult->fetch_assoc()['total'];

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
        FROM entertainment_articles
        ORDER BY publishedAt DESC
        LIMIT $resultsPerPage OFFSET $offset";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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
echo "</div>";
// Pagination links
echo "<div class='container'>";
echo "<ul class='pagination'>";
if ($totalPages > 1) {
    for ($i = 1; $i <= $totalPages; $i++) {
        $activeClass = ($i == $page) ? 'active' : '';
        echo "<li><a class='$activeClass' href='?page=$i'>$i</a></li>";
    }
}
echo "</ul>";
echo "</div>";
?>


            
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
</body>
</html>

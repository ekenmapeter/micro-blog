
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
        $result = $conn->query("SELECT 
            id,
            title,
            source,
            url,
            urlToImage,
            status,
            publishedAt
        FROM business_articles
        ORDER BY publishedAt DESC
        LIMIT 6");



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


    ?>
           










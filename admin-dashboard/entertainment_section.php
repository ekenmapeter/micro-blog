 <?php include '../connections/auth.php'; ?>


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
        <?php include '../components/user-navbar.php'; ?>
         <?php include '../connections/entertainment_api.php'; ?>
        <div class="space-up">
            <div class="container" style="margin-top: 12px;">
                <h2 style="margin-bottom: 6px;">Add New Category </h2>
                    <div class="row ">
                    <a href="sports_section.php" class="read-more column button pad" style="padding: 14px;">Sport News</a>
                    <a href="entertainment_section.php" class="read-more column button pad" style="padding: 14px;">Entertainment News</a>
                    <a href="business_section.php" class="read-more column button pad" style="padding: 14px;">Business News</a>
                    <a href="world_section.php" class="read-more column button pad" style="padding: 14px;">World News</a>
                  </div>
          </div>




<div class="table-wrapper">
    <div class="container row">
        <h2>Entertainment Posts</h2>
        <p style="padding-left:8px; padding-right: 18px;">New articles added: <?php echo $newArticlesCount; ?></p>
        <form method="post">
            <button type="submit" class="published" name="refresh">Refresh Articles</button>
        </form>
    </div>
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
            status,
            publishedAt
        FROM entertainment_articles
       ");


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['title']}</td>
            <td>{$row['source']}</td>
            <td>Entertainment News</td>
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
            echo '<button class="pending">Publish</button>';
        } else {
            echo '<button class="unpublished">UnPublish</button>';
        }
        echo "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}


    ?>
</tbody>

    </table>
</div>

<?php
// Close the database connection
$conn->close();
?>


        <?php include '../components/footer.php'; ?>
    </body>
</html>



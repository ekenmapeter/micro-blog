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
        <?php include '../components/admin-navbar.php'; ?>
        <div class="space-up">
          <div class="container" style="margin-bottom: 15px;">
            <h2 style="margin-bottom: 6px;">Welcome, Admin Dashboard </h2>
            <p style="margin-bottom: 6px;">The following are the current statistic on your blog.</p>
              <div class="card">
                  <a href="create-post.php"><h3>Add New Post</h3></a>
              </div>
          </div>
          <div class="container" style="margin-bottom: 15px;">
        <?php include '../components/total_post_section.php'; ?>
      </div>

          <div class="container">
            <h2 style="margin-bottom: 6px;">View Category </h2>
            <div class="row ">
            <a href="sports_section.php" class="read-more column button pad" style="padding: 14px;">Sport News</a>
            <a href="entertainment_section.php" class="read-more column button pad" style="padding: 14px;">Entertainment News</a>
            <a href="business_section.php" class="read-more column button pad" style="padding: 14px;">Business News</a>
            <a href="world_section.php" class="read-more column button pad" style="padding: 14px;">World News</a>
          </div>
          </div>
          
          </div>
        <?php include '../components/footer.php'; ?>
    </body>
</html>


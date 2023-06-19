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
          <div class="container">
            <h2 style="margin-bottom: 6px;">Welcome, Admin Dashboard </h2>
            <p style="margin-bottom: 6px;">The following are the current statistic on your blog.</p>

            <div class="row">
              <div class="column">
                <div class="card">
                  <h3>Total Post</h3>
                  <p>1,000</p>
                </div>
              </div>

              <div class="column">
                <div class="card">
                  <h3>Total Category</h3>
                  <p>4</p>
                </div>
              </div>
              
              <div class="column">
                <div class="card">
                  <h3>Total Users</h3>
                  <p>5</p>
                </div>
              </div>
              
              <div class="column">
                <div class="card">
                  <h3>Add New Post</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="container" style="margin-top: 12px;">
            <h2 style="margin-bottom: 6px;">Add New Category </h2>
            <div class="row ">
            <a href="sports_section.php" class="read-more column button pad" style="padding: 14px;">Sport News</a>
            <a href="entertainment_section.php" class="read-more column button pad" style="padding: 14px;">Entertainment News</a>
            <a href="business_section.php" class="read-more column button pad" style="padding: 14px;">Business News</a>
            <a href="world_section.php" class="read-more column button pad" style="padding: 14px;">World News</a>
          </div>
          </div>
          
        <?php include '../components/footer.php'; ?>
    </body>
</html>


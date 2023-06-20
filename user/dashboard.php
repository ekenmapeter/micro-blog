 <?php include '../connections/auth.php'; ?>


<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - MicroBlog</title>
        <link rel="stylesheet" type="text/css" href="../css/navbar.css" />
        <link rel="stylesheet" type="text/css" href="../css/footer.css" />
        <link rel="stylesheet" type="text/css" href="../css/blog.css" />
        <link rel="stylesheet" type="text/css" href="../css/auth.css" />
        <link rel="stylesheet" type="text/css" href="../css/user.css" />
        <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />

        <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    </head>
    <body>
        <?php include '../components/user-navbar.php'; ?>

  

        <div class="space-up">
  <header>
    <h1>User Dashboard</h1>
  </header>
    <div class="space-up">
          <div class="container" style="margin-bottom: 15px;">
            <h2 style="margin-bottom: 6px;">Welcome, <?php echo $_SESSION['username']; ?> .</h2>
            <p style="margin-bottom: 6px;">The following are the current statistic on your blog.</p>
              <div class="card">
                  <a href="create-user-post.php"><h3>Add New Post</h3></a>
              </div>
          </div>
          <div class="container" style="margin-bottom: 15px;">
        <?php include '../components/total_user_post_section.php'; ?>
      </div>
          
          </div>

        <?php include '../components/footer.php'; ?>
    </body>
</html>
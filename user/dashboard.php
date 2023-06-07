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
    </head>
    <body>
        <?php include '../components/user-navbar.php'; ?>

  

        <div class="space-up">
  <header>
    <h1>User Dashboard</h1>
  </header>
  <main>
    <section>
      <h2>Recent Posts</h2>
      <ul>
        <li>
          <a href="#">This is a recent post</a>
        </li>
        <li>
          <a href="#">This is another recent post</a>
        </li>
        <li>
          <a href="#">This is one more recent post</a>
        </li>
      </ul>
    </section>
    <section>
      <h2>Statistics</h2>
      <ul>
        <li>
          <strong>Total Posts:</strong> 10
        </li>
        <li>
          <strong>Total Views:</strong> 1000
        </li>
        <li>
          <strong>Average Views Per Post:</strong> 100
        </li>
      </ul>
    </section>
  </main>

        <?php include '../components/footer.php'; ?>
    </body>
</html>
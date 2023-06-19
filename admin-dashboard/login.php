<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin - MicroBlog</title>
        <link rel="stylesheet" type="text/css" href="../css/navbar.css" />
        <link rel="stylesheet" type="text/css" href="../css/footer.css" />
        <link rel="stylesheet" type="text/css" href="../css/blog.css" />
        <link rel="stylesheet" type="text/css" href="../css/auth.css" />
        <link rel="stylesheet" type="text/css" href="../css/user.css" />
    </head>
    <body>
        <?php include '../components/navbar.php'; ?>

        <div class="space-up">
            <div class="login-form">
                <h1 style="text-align: center; padding-bottom: 10px;">Admin Login</h1>
               <form method="POST" action="../connections/admin_login_form.php">
                <input type="text"  name="username" placeholder="Username">
                <input type="password" name="password"  placeholder="Password">
                <button style="background-color: red;">Admin Login</button>
            </form>
              </div>
       </div>

        <?php include '../components/footer.php'; ?>
    </body>
</html>

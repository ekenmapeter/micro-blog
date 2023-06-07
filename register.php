<?php include 'connections/auth.php'; ?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register - MicroBlog</title>
        <link rel="stylesheet" type="text/css" href="css/navbar.css" />
        <link rel="stylesheet" type="text/css" href="css/footer.css" />
        <link rel="stylesheet" type="text/css" href="css/blog.css" />
        <link rel="stylesheet" type="text/css" href="css/auth.css" />
        <link rel="stylesheet" type="text/css" href="css/user.css" />
    </head>
    <body>
        <?php include 'components/navbar.php'; ?>

        <div class="space-up">
            <div class="login-form">
                <h1 style="text-align: center; padding-bottom: 10px;">Register</h1>
                <form method="POST" action="./connections/register_form.php">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="text" name="fullname" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button  type="submit" name="submit" >Register</button>
                </form>
              </div>
       </div>

        <?php include 'components/footer.php'; ?>
    </body>
</html>

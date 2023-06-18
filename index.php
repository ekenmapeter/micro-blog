<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>MicroBlog - Get the latest blog news around the world.</title>
        <link rel="stylesheet" type="text/css" href="css/navbar.css" />
        <link rel="stylesheet" type="text/css" href="css/footer.css" />
        <link rel="stylesheet" type="text/css" href="css/blog.css" />
        <link rel="stylesheet" type="text/css" href="css/auth.css" />
        <link rel="stylesheet" type="text/css" href="css/user.css" />
    </head>
    <body>
        <?php include 'components/navbar.php'; ?>

        <div class="space-up">
            <div class="grid-1">
                <div>
                    <div style="padding: 4px;">
                        <p class="blog-section-header">Business News</p>
                    </div>
                    <div class="grid" style="padding: 4px;">
                        <?php include 'components/home_business.php'; ?>
                    </div>
                    <div style="padding: 4px;">
                        <button href="business-news.php" class="more-button">More News</button>
                    </div>
                </div>
                <div>
                    <div style="padding: 4px;">
                        <p class="blog-section-header">Sport News</p>
                    </div>
                    <div class="grid" style="padding: 4px;">
                       <?php include 'components/home_sports.php'; ?>
                    </div>
                    <div style="padding: 4px;">
                        <button class="more-button">More News</button>
                    </div>
                </div>
            </div>
            <div class="grid-1">
                <div>
                    <div style="padding: 4px;">
                        <p class="blog-section-header">Entertainment News</p>
                    </div>
                    <div class="grid" style="padding: 4px;">
                        <?php include 'components/home_entertainment.php'; ?>
                    </div>
                    <div style="padding: 4px;">
                        <button class="more-button">More News</button>
                    </div>
                </div>
                <div>
                    <div style="padding: 4px;">
                        <p class="blog-section-header">World News</p>
                    </div>
                    <div class="grid" style="padding: 4px;">
                        <?php include 'components/home_world_news.php'; ?>
                    </div>
                    <div style="padding: 4px;">
                        <button class="more-button">More News</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'components/footer.php'; ?>
    </body>
</html>

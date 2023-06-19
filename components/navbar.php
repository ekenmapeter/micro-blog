<?php session_start(); ?>
<nav class="navbar">
    <div class="navbar-container container">
        <input type="checkbox" name="" id="">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <ul class="menu-items">
            <li><a href="index.php">Home</a></li>
            <li><a href="business-news.php">Business News</a></li>
            <li><a href="sport-news.php">Sports News</a></li>
            <li><a href="entertainment-news.php">Entertainment News</a></li>
            <li><a href="worldnews.php">World News</a></li>
            <?php
            if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
                // User is logged in as admin, display admin dashboard link
                echo '<li><a class="username-btn" href="admin-dashboard/dashboard.php">' . $_SESSION['username'] . '</a></li>';
                echo '<li><a class="logout-btn" href="connections/logout.php">Logout</a></li>';
            } elseif (isset($_SESSION['username']) && $_SESSION['username'] !== 'admin') {
                // User is logged in as non-admin, display user dashboard link
                echo '<li><a class="username-btn" href="user/dashboard.php">' . $_SESSION['username'] . '</a></li>';
                echo '<li><a class="logout-btn" href="connections/logout.php">Logout</a></li>';
            } else {
                // User is not logged in, display login and register links
                echo '<li><a href="login.php">Login</a></li>';
                echo '<li><a href="register.php">Register</a></li>';
            }
            ?>
        </ul>
        <a href="index.php"><h1 class="logo">MicroBlog</h1></a>
    </div>
</nav>

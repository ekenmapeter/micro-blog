<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'fetchBlogPosts') {
        function fetchBlogPosts() {
            // BBC News API endpoint to fetch news articles
            $apiUrl = 'https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=dfc95564d57a4bd88faa68c3def5bf51';

            // Fetch the news articles from the BBC News API
            $newsData = file_get_contents($apiUrl);
            $newsArray = json_decode($newsData, true);

            // Echo the blog posts as JSON
            header('Content-Type: application/json');
            echo json_encode($newsArray['articles']);
        }

        // Call the function to fetch blog posts
        fetchBlogPosts();
    }
}


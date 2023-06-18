<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sport News - Get the latest sport news around the world.</title>
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/blog.css" />
    <link rel="stylesheet" type="text/css" href="css/user.css" />
</head>
<body>
    <?php include 'components/navbar.php'; ?>
    <div class="space-up">
        <div>
            <div style="padding: 4px;">
                <p class="blog-section-header">Sport News</p>
            </div>
            <div class="grid-2" style="padding: 4px;">
                <?php

                // API endpoint URL
                $url = 'https://newsapi.org/v2/top-headlines?country=us&category=sports&apiKey=dfc95564d57a4bd88faa68c3def5bf51';

                // Initialize cURL
                $ch = curl_init();

                // Set the cURL options
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Micro Blog'); // Set your desired User-Agent header value

                // Execute the cURL request
                $response = curl_exec($ch);

                // Check for errors
                if ($response === false) {
                    echo 'cURL Error: ' . curl_error($ch);
                }

                // Close the cURL session
                curl_close($ch);

                // Handle the response
                if (!empty($response)) {
                    $data = json_decode($response, true);

                    // Check if API request was successful
                    if ($data['status'] === 'ok') {
                        // Access the articles
                        $articles = $data['articles'];

                        // Define the number of articles per page
                        $articlesPerPage = 12;

                        // Calculate the total number of pages
                        $totalPages = ceil(count($articles) / $articlesPerPage);

                        // Get the current page number
                        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Calculate the starting index of the articles for the current page
                        $startIndex = ($currentPage - 1) * $articlesPerPage;

                        // Get the articles for the current page
                        $currentPageArticles = array_slice($articles, $startIndex, $articlesPerPage);

                        // Process and display the articles
                        foreach ($currentPageArticles as $article) {
                            $title = $article['title'];
                            $description = $article['description'];
                            $url = $article['url'];
                            $imageUrl = $article['urlToImage'];
                            echo '<div class="grid-1 border">';
                            echo '<img src="' . $imageUrl . '" alt="Article Image">';
                            echo '<div>';
                            echo '<a href="' . $url . '"><h2 class="blog-title">' . $title . '</h2></a>';
                            echo '<p class="blog-description">' . $description . '</p>';
                            echo '<a class="read-more" href="' . $url . '">Read more</a>';
                            echo '</div>';
                            echo '</div>';
                        }

                        
                    } else {
                        echo 'API Error: ' . $data['message'];
                    }
                } else {
                    echo 'Empty response received from the API.';
                }
                ?>
            </div>
            <?php
            // Pagination links
                        echo '<div style="padding: 4px;">';
                        echo '<ul class="pagination">';
                        if ($currentPage > 1) {
                            echo '<li><a href="?page=' . ($currentPage - 1) . '">Prev</a></li>';
                        }
                        for ($i = 1; $i <= $totalPages; $i++) {
                            echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                        if ($currentPage < $totalPages) {
                            echo '<li><a href="?page=' . ($currentPage + 1) . '">Next</a></li>';
                        }
                        echo '</ul>';
                        ?>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
</body>
</html>

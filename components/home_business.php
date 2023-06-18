
           
                <?php

                // API endpoint URL
                $url = 'https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=dfc95564d57a4bd88faa68c3def5bf51';

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
                        $articlesPerPage = 6;

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
                            echo '<img src="' . $imageUrl . '" alt="Article Image" width="161px" height="108px">';
                            echo '<div>';
                            echo '<a href="' . $url . '"><h2 class="blog-title">' . $title . '</h2></a>';
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
<?php 
include '../connections/connectDB.php';

try {
    // Get the total number of posts for each category
    $query_business = "SELECT COUNT(*) as total_business FROM business_articles";
    $query_entertainment = "SELECT COUNT(*) as total_entertainment FROM entertainment_articles";
    $query_sport = "SELECT COUNT(*) as total_sport FROM sport_articles";
    $query_world = "SELECT COUNT(*) as total_world FROM world_articles";
    
    $stmt_business = $pdo->query($query_business);
    $stmt_entertainment = $pdo->query($query_entertainment);
    $stmt_sport = $pdo->query($query_sport);
    $stmt_world = $pdo->query($query_world);
    
    $total_business = $stmt_business->fetchColumn();
    $total_entertainment = $stmt_entertainment->fetchColumn();
    $total_sport = $stmt_sport->fetchColumn();
    $total_world = $stmt_world->fetchColumn();

    // Get the total number of posts across all categories
    $total_post = $total_business + $total_entertainment + $total_sport + $total_world;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="row">
    <div class="column">
        <div class="card">
            <h3>Total Business</h3>
            <p><?php echo $total_business; ?></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h3>Total Sport</h3>
            <p><?php echo $total_sport; ?></p>
        </div>
    </div>
    
    <div class="column">
        <div class="card">
            <h3>Total Entertainment</h3>
            <p><?php echo $total_entertainment; ?></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h3>Total World News</h3>
            <p><?php echo $total_world; ?></p>
        </div>
    </div>
    
    <div class="column">
        <div class="card">
            <h3>All Post</h3>
            <p><?php echo $total_post; ?></p>
        </div>
    </div>
</div>



<?php
include '../includes/db.php';
include '../includes/header.php';
?>

<!-- Core theme CSS -->
<link href="../css/styles.css" rel="stylesheet" />

<!-- Page header with logo and tagline -->
<header class="py-1 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to Our Blog</h1>
            <p class="lead mb-0">Insights, tips, and stories from the influencer marketing world</p>
        </div>
    </div>
</header>

<!-- Page content -->
<div class="container">
    <div class="row">
        <!-- Blog entries -->
        <div class="col-lg-8">
            <!-- Loop through blog posts -->
            <?php
            $query = "SELECT * FROM blogs ORDER BY published_at DESC";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()):
                $title = $row['title'];
                $slug = $row['slug'];
                $author = $row['author'];
                $date = date('F d, Y', strtotime($row['published_at']));
                $thumbnail = !empty($row['thumbnail']) ? '../admin/' . $row['thumbnail'] : '../img/blog-placeholder.png';
                $excerpt = substr(strip_tags($row['content']), 0, 150) . '...';
            ?>
            <!-- Blog post -->
            <div class="card mb-4">
                <a href="#"><img class="card-img-top" src="<?= $thumbnail ?>" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted"><?= $date ?></div>
                    <h2 class="card-title h4"><?= $title ?></h2>
                    <p class="card-text"><?= $excerpt ?></p>
                    <a class="btn btn-primary" href="blog-detail.php?slug=<?= $slug ?>">Read more →</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <!-- Side widgets -->
        <div class="col-lg-4">
            <!-- Search widget -->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget -->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Marketing</a></li>
                                <li><a href="#!">Social Media</a></li>
                                <li><a href="#!">Influencers</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Strategy</a></li>
                                <li><a href="#!">Trends</a></li>
                                <li><a href="#!">Case Studies</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget -->
            <div class="card mb-4">
                <div class="card-header">About</div>
                <div class="card-body">Explore the latest in influencer marketing, brand strategies, and growth hacks for your next campaign.</div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="../js/scripts.js"></script>

<?php include '../includes/footer.php'; ?>

<?php
session_start();
include '../includes/db.php';

$slug = $_GET['slug'] ?? '';
$stmt = $conn->prepare("SELECT * FROM blogs WHERE slug = ?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();

if (!$blog) {
    echo "<div style='padding: 20px; color: red;'>Blog not found.</div>";
    include '../includes/footer.php';
    exit;
}

include '../includes/header.php';
?>

<!-- Page content -->
<div class="container mt-5">
    <div class="row">
        <!-- Blog entries -->
        <div class="col-lg-8">
            <article>
                <header class="mb-4">
                    <h1 class="fw-bold"><?= htmlspecialchars($blog['title']) ?></h1>
                    <div class="text-muted fst-italic mb-2">Published on <?= date('F j, Y', strtotime($blog['published_at'])) ?> by <?= htmlspecialchars($blog['author']) ?></div>
                </header>
                <?php if (!empty($blog['thumbnail'])): ?>
                    <figure class="mb-4"><img class="img-fluid rounded" src="../<?= $blog['thumbnail'] ?>" alt="Blog Thumbnail" /></figure>
                <?php endif; ?>
                <section class="mb-5">
                    <div class="fs-5"><?= $blog['content'] ?></div>
                </section>
            </article>

            <!-- Comment Form -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Join the discussion and leave a comment!</h5>
                    <form>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Write your comment here..."></textarea>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="card bg-light mb-4">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <img class="rounded-circle me-3" src="https://via.placeholder.com/50" alt="User" />
                        <div>
                            <h6 class="fw-bold mb-1">Commenter Name</h6>
                            <p>If you're going to lead a space frontier, it has to be government; it'll never be private enterprise.</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 ms-5">
                        <img class="rounded-circle me-3" src="https://via.placeholder.com/50" alt="Reply User" />
                        <div>
                            <h6 class="fw-bold mb-1">Reply User</h6>
                            <p>This is a nested reply comment to the original comment.</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <img class="rounded-circle me-3" src="https://via.placeholder.com/50" alt="User" />
                        <div>
                            <h6 class="fw-bold mb-1">Another User</h6>
                            <p>And under those conditions, you cannot establish a capital-market evaluation of that enterprise.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side widgets -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." />
                        <button class="btn btn-primary" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Strategy</a></li>
                        <li><a href="#">Trends</a></li>
                    </ul>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">About This Blog</div>
                <div class="card-body">Insights on influencer marketing, growth hacks, brand partnerships, and trends that drive engagement.</div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

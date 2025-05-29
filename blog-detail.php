<?php
session_start();
include __DIR__ . '/includes/db.php';

// --- AJAX Comment submission ---
$is_ajax = isset($_POST['ajax']) && $_POST['ajax'] == '1';

if (isset($_POST['submit_comment']) || $is_ajax) {
    $name = trim($_POST['name']);
    $comment = trim($_POST['comment']);

    // Fetch blog ID from slug
    $slug = $_GET['slug'] ?? '';
    $stmt = $conn->prepare("SELECT id FROM blogs WHERE slug = ?");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $result = $stmt->get_result();
    $blog = $result->fetch_assoc();
    $blog_id = $blog ? $blog['id'] : null;

    if ($blog_id && $name && $comment) {
        $stmt = $conn->prepare("INSERT INTO comments (blog_id, name, comment) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $blog_id, $name, $comment);
        $stmt->execute();

        // Prepare HTML for new comment (same UI as original)
        $comment_html = '<div class="d-flex mb-3">'
            . '<img class="rounded-circle me-3" src="img/user-default.png" width="50" height="50" alt="User" />'
            . '<div>'
            . '<h6 class="fw-bold mb-1">' . htmlspecialchars($name) . '</h6>'
            . '<div class="text-muted small">' . date('F j, Y H:i') . '</div>'
            . '<p>' . nl2br(htmlspecialchars($comment)) . '</p>'
            . '</div></div>';


        if ($is_ajax) {
            echo json_encode([
                "success" => true,
                "message" => "Comment submitted!",
                "comment_html" => $comment_html
            ]);
            exit;
        } else {
            echo '<div class="alert alert-success">Comment submitted!</div>';
        }
    } else {
        if ($is_ajax) {
            echo json_encode([
                "success" => false,
                "message" => "Name and comment required."
            ]);
            exit;
        }
    }
}

// --- Load Blog by Slug ---
$slug = $_GET['slug'] ?? '';
$stmt = $conn->prepare("SELECT * FROM blogs WHERE slug = ?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();

if (!$blog) {
    echo "<div style='padding: 20px; color: red;'>Blog not found.</div>";
    include __DIR__ . '/includes/footer.php';
    exit;
}

include __DIR__ . '/includes/header.php';
?>

<!-- Page content -->
<div class="container mt-5">
    <div class="row">
        <!-- Blog content -->
        <div class="col-lg-8">
            <article>
                <header class="mb-4">
                    <h1 class="fw-bold"><?= htmlspecialchars($blog['title']) ?></h1>
                    <div class="text-muted fst-italic mb-2">Published on <?= date('F j, Y', strtotime($blog['published_at'])) ?> by <?= htmlspecialchars($blog['author']) ?></div>
                </header>
                <?php if (!empty($blog['thumbnail'])): ?>
                    <figure class="mb-4"><img class="img-fluid rounded" src="<?= 'admin/' . $blog['thumbnail'] ?>" alt="Blog Thumbnail" /></figure>
                <?php endif; ?>
                <section class="mb-5">
                    <div class="fs-5"><?= $blog['content'] ?></div>
                </section>
            </article>

            <!-- Comment Form -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div id="comment-alert"></div>
                    <h5 class="card-title">Join the discussion and leave a comment!</h5>
                    <form id="commentForm" method="post" action="">
                        <div class="mb-3">
                            <input type="text" class="form-control mb-2" name="name" placeholder="Your Name" required>
                            <textarea class="form-control" name="comment" rows="3" placeholder="Write your comment here..." required></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit_comment">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Comments Section (dynamic) -->
            <div class="card bg-light mb-4">
                <div class="card-body" id="comments-list">
                    <?php
                    // Fetch all approved comments for this blog
                    $stmt = $conn->prepare("SELECT name, comment, created_at FROM comments WHERE blog_id = ? AND status = 'approved' ORDER BY created_at DESC");
                    $stmt->bind_param("i", $blog['id']);
                    $stmt->execute();
                    $comments = $stmt->get_result();

                    if ($comments->num_rows > 0):
                        while ($c = $comments->fetch_assoc()): ?>
                            <div class="d-flex mb-3">
                               <img class="rounded-circle me-3" src="img/user-default.png" width="50" height="50" alt="User" />
                                <div>
                                    <h6 class="fw-bold mb-1"><?= htmlspecialchars($c['name']) ?></h6>
                                    <div class="text-muted small"><?= date('F j, Y H:i', strtotime($c['created_at'])) ?></div>
                                    <p><?= nl2br(htmlspecialchars($c['comment'])) ?></p>
                                </div>
                            </div>
                        <?php endwhile;
                    else: ?>
                        <div class="text-muted">No comments yet. Be the first to comment!</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Search widget -->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." />
                        <button class="btn btn-primary" type="button">Go!</button>
                    </div>
                </div>
            </div>

            <!-- Categories widget -->
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

            <!-- About widget -->
            <div class="card mb-4">
                <div class="card-header">About This Blog</div>
                <div class="card-body">Insights on influencer marketing, growth hacks, brand partnerships, and trends that drive engagement.</div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const commentForm = document.getElementById('commentForm');
    const commentAlert = document.getElementById('comment-alert');
    const commentsList = document.getElementById('comments-list');

    commentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(commentForm);
        formData.append('ajax', '1'); // Let PHP know it's AJAX

        fetch(window.location.pathname + window.location.search, {
            method: 'POST',
            body: formData
        })
        .then(r => r.json())
        .then(data => {
            commentAlert.innerHTML = `<div class="alert alert-${data.success ? 'success' : 'danger'}">${data.message}</div>`;
            commentAlert.style.display = 'block';

            // Hide alert after 2 seconds
            setTimeout(() => {
                commentAlert.style.display = 'none';
            }, 2000);

            if (data.success && data.comment_html) {
                // Prepend new comment to the list
                commentsList.insertAdjacentHTML('afterbegin', data.comment_html);
                commentForm.reset();
            }
        })
        .catch(() => {
            commentAlert.innerHTML = `<div class="alert alert-danger">Something went wrong. Try again!</div>`;
            commentAlert.style.display = 'block';
            setTimeout(() => { commentAlert.style.display = 'none'; }, 2000);
        });
    });
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>

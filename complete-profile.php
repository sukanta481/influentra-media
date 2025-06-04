<?php
session_start();
include 'includes/header.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'influencer') {
    header("Location: login.php");
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
    body {
        background-color: #f8f9fa;
    }
    .profile-card {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        border-radius: 20px;
        background-color: #fff;
        box-shadow: 0 0 30px rgba(0,0,0,0.05);
    }
    .profile-card label {
        font-weight: 500;
    }
    .submit-btn {
        background-color: #2563eb;
        color: white;
        font-weight: 500;
    }
    .submit-btn:hover {
        background-color: #1d4ed8;
    }
</style>

<div class="profile-card">
    <h2 class="text-center mb-4 fw-bold">Profile Completion</h2>
    <form action="ajax/profile-handler.php" method="POST" enctype="multipart/form-data">
        
        <div class="mb-4 text-center">
            <label for="profile_image" class="form-label">Upload Profile Photo</label>
            <input type="file" name="profile_image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Full Bio</label>
            <textarea name="bio" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Niche/Category</label>
            <select name="category" class="form-select" required>
                <option value="">Select</option>
                <option value="Fitness">Fitness</option>
                <option value="Beauty">Beauty</option>
                <option value="Tech">Tech</option>
                <option value="Parenting">Parenting</option>
                <option value="Gaming">Gaming</option>
                <option value="Fashion">Fashion</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Social Media Links</label>
            <input type="url" class="form-control mb-2" name="instagram" placeholder="Instagram URL">
            <input type="url" class="form-control mb-2" name="youtube" placeholder="YouTube URL">
            <input type="url" class="form-control mb-2" name="x" placeholder="X (Twitter) URL">
            <input type="url" class="form-control mb-2" name="tiktok" placeholder="TikTok URL">
            <input type="url" class="form-control" name="amazon" placeholder="Amazon Review URL">
        </div>

        <div class="mb-3">
            <label class="form-label">Portfolio Links</label>
            <input type="url" class="form-control mb-2" name="portfolio1" placeholder="Portfolio URL 1">
            <input type="url" class="form-control" name="portfolio2" placeholder="Portfolio URL 2">
        </div>

        <div class="mb-4">
            <label class="form-label">Upload Media Files (max 5)</label>
            <input type="file" name="media_files[]" class="form-control" multiple accept="image/*,video/*">
        </div>

        <button type="submit" class="btn submit-btn w-100">Submit</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>

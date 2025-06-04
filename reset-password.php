<?php
include 'includes/header.php';
include 'admin/includes/db.php';

// Validate token in URL
$valid = false;
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $stmt = $conn->prepare("SELECT user_id, expires_at FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $expires_at);
        $stmt->fetch();
        if (strtotime($expires_at) > time()) {
            $valid = true;
        }
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
body { background-color: #f8f9fa; }
.reset-card { max-width: 420px; margin: 6% auto; padding: 30px; border-radius: 20px; box-shadow: 0 0 30px rgba(0,0,0,0.05); background: #fff; }
.reset-btn { background-color: #2563eb; color: white; font-weight: 500; }
.reset-btn:hover { background-color: #1d4ed8; }
</style>

<div class="reset-card">
    <h2 class="text-center mb-4 fw-bold">Reset Password</h2>
    <?php if ($valid): ?>
        <form action="ajax/reset-password-handler.php" method="POST">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" minlength="6" required />
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" minlength="6" required />
            </div>
            <button type="submit" class="btn reset-btn w-100">Set New Password</button>
        </form>
    <?php else: ?>
        <div class="alert alert-danger">
            The reset link is invalid or has expired.<br>
            <a href="forgot-password.php" class="text-primary">Request a new password reset</a>
        </div>
    <?php endif; ?>
</div>
<?php include 'includes/footer.php'; ?>

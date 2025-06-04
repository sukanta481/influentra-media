<?php include 'includes/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

<style>
    body { background-color: #f8f9fa; }
    .forgot-card {
        max-width: 420px;
        margin: 6% auto;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 0 30px rgba(0,0,0,0.05);
        background: #fff;
    }
    .forgot-btn {
        background-color: #2563eb;
        color: white;
        font-weight: 500;
    }
    .forgot-btn:hover {
        background-color: #1d4ed8;
    }
    .extra-links {
        text-align: center;
        margin-top: 18px;
    }
    .extra-links a {
        color: #2563eb;
        text-decoration: none;
        font-size: 15px;
        margin-left: 4px;
    }
    .extra-links a:hover {
        color: #1d4ed8;
        text-decoration: underline;
    }
</style>

<div class="forgot-card">
    <h2 class="text-center mb-4 fw-bold">Forgot Password?</h2>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">If this email is registered, a reset link has been sent.</div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger">Email not found or sending failed.</div>
    <?php endif; ?>
    <form action="ajax/forgot-password-handler.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Enter your email address</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <button type="submit" class="btn forgot-btn w-100">Send Reset Link</button>
    </form>
    <div class="extra-links">
        Remember your password?
        <a href="login.php">Login</a>
    </div>
</div>
<?php include 'includes/footer.php'; ?>

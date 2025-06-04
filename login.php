<?php include 'includes/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

<style>
    body {
        background-color: #f8f9fa;
    }
    .login-card {
        max-width: 420px;
        margin: 5% auto;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 0 30px rgba(0,0,0,0.05);
        background: #fff;
    }
    .login-btn {
        background-color: #2563eb;
        color: white;
        font-weight: 500;
    }
    .login-btn:hover {
        background-color: #1d4ed8;
    }
    .extra-links {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }
    .extra-links a {
        font-size: 15px;
        text-decoration: none;
        color: #2563eb;
        transition: color 0.2s;
    }
    .extra-links a:hover {
        color: #1d4ed8;
        text-decoration: underline;
    }
</style>

<div class="login-card">
    <h2 class="text-center mb-4 fw-bold">Login</h2>

    <?php if (isset($_GET['registered'])): ?>
        <div class="alert alert-success">Registered successfully! Please log in.</div>
    <?php elseif (isset($_GET['error']) && $_GET['error'] == 'invalid'): ?>
        <div class="alert alert-danger">Invalid email or password.</div>
    <?php elseif (isset($_GET['reset']) && $_GET['reset'] == 'success'): ?>
        <div class="alert alert-success">Password reset successful. Please login with your new password.</div>
    <?php endif; ?>

    <form action="ajax/login-handler.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <button type="submit" class="btn login-btn w-100">Login</button>
    </form>

    <div class="extra-links mt-3">
        <a href="register.php">Sign Up</a>
        <a href="forgot-password.php">Forgot Password?</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

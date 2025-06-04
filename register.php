<?php include 'includes/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

<style>
    body {
        background-color: #f8f9fa;
    }
    .register-card {
        max-width: 420px;
        margin: 5% auto;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 0 30px rgba(0,0,0,0.05);
        background: #fff;
    }
    .register-btn {
        background-color: #2563eb;
        color: white;
        font-weight: 500;
    }
    .register-btn:hover {
        background-color: #1d4ed8;
    }
</style>

<div class="register-card">
    <h2 class="text-center mb-4 fw-bold">Register</h2>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'email_exists'): ?>
        <div class="alert alert-warning">This email is already registered.</div>
    <?php elseif (isset($_GET['error']) && $_GET['error'] == 'failed'): ?>
        <div class="alert alert-danger">Something went wrong. Please try again.</div>
    <?php endif; ?>

    <form action="ajax/register-handler.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <div class="mb-4">
            <label class="form-label">I am a:</label>
            <select name="role" class="form-select" required>
                <option value="">Select</option>
                <option value="influencer">Influencer</option>
                <option value="brand">Brand</option>
            </select>
        </div>
        <button type="submit" class="btn register-btn w-100">Register</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>

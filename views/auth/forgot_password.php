<?php include 'views/common/header.php'; ?>

<link rel="stylesheet" href="assets/css/auth.css">

<div class="auth-box">
    <h2>Forgot Password</h2>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter your email">
        <button type="submit">Verify Email</button>
    </form>

    <div class="auth-links">
        <a href="index.php?action=login">Back to Login</a>
    </div>
</div>

<?php include 'views/common/footer.php'; ?>

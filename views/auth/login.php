<?php include 'views/common/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="assets/js/auth_validation.js"></script>
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body>

<div class="auth-box">
<h2>Login</h2>

<form method="POST" onsubmit="return validateLogin();">
    <input type="email" name="email" id="login_email" placeholder="Email"><br><br>

    <input type="password" name="password" id="login_password" placeholder="Password"><br><br>

    <button type="submit">Login</button>
</form>

<div class="auth-links">
    <a href="index.php?action=register">Register</a> |
    <a href="index.php?action=forgot_password">Forgot Password?</a>
</div>
</div>

<?php include 'views/common/footer.php'; ?>

</body>
</html>

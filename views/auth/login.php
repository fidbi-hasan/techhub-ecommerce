<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="assets/js/auth_validation.js"></script>
</head>
<body>

<h2>Login</h2>

<form method="POST" onsubmit="return validateLogin();">
    <input type="email" name="email" id="login_email" placeholder="Email"><br><br>

    <input type="password" name="password" id="login_password" placeholder="Password"><br><br>

    <button type="submit">Login</button>
</form>

<p>
    <a href="index.php?action=register">Register</a> |
    <a href="index.php?action=reset_password">Forgot Password?</a>
</p>

</body>
</html>

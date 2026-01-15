<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="assets/js/auth_validation.js"></script>
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body>

<div class="auth-box">
<h2>Register</h2>

<form method="POST" onsubmit="return validateRegister();">
    <input type="text" name="name" id="name" placeholder="Full Name"><br><br>

    <input type="email" name="email" id="email" placeholder="Email"><br><br>

    <input type="password" name="password" id="password" placeholder="Password"><br><br>

    <select name="role" id="role">
        <option value="">Select Role</option>
        <option value="customer">Customer</option>
        <option value="seller">Seller</option>
    </select><br><br>

    <button type="submit">Register</button>
</form>

<div class="auth-links">
<p>Already have an account? <a href="index.php?action=login">Login</a></p>
</div>
</div>
</body>
</html>

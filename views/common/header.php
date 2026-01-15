<link rel="stylesheet" href="assets/css/style.css">

<div style="background:#222; padding:12px;">
    <div class="container" style="background:none; color:#fff;">
        <strong>TechHub</strong>

        <span style="float:right;">
            <a href="index.php?action=products" style="color:#fff; margin-right:15px;">Products</a>

            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="index.php?action=logout" style="color:#fff;">Logout</a>
            <?php else: ?>
                <a href="index.php?action=login" style="color:#fff;">Login</a>
            <?php endif; ?>
        </span>
    </div>
</div>

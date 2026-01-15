<link rel="stylesheet" href="assets/css/style.css">

<header class="navbar">
    <div class="nav-container">
        <a href="index.php?action=home" class="logo">TechHub</a>

        <nav>
            <a href="index.php?action=products">Products</a>

            <?php if (isset($_SESSION['user_id'])): ?>

                <?php if ($_SESSION['role'] === 'customer'): ?>
                    <a href="index.php?action=orders">My Orders</a>
                    <a href="index.php?action=cart">Cart</a>
                <?php elseif ($_SESSION['role'] === 'seller'): ?>
                    <a href="index.php?action=seller_products">Add Product</a>
                    <a href="index.php?action=seller_orders">Orders</a>
                <?php elseif ($_SESSION['role'] === 'admin'): ?>
                    <a href="index.php?action=admin_products">Approve Products</a>
                <?php endif; ?>

                <span class="nav-user">
                    <?php echo htmlspecialchars($_SESSION['name']); ?>
                </span>
                <a href="index.php?action=logout" class="logout">Logout</a>

            <?php else: ?>
                <a href="index.php?action=login">Login</a>
                <a href="index.php?action=register">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

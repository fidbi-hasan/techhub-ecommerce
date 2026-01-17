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

                <?php
                $dashboardLink = '#';

                if ($_SESSION['role'] === 'customer') {
                    $dashboardLink = 'index.php?action=customer_dashboard';
                } elseif ($_SESSION['role'] === 'seller') {
                    $dashboardLink = 'index.php?action=seller_dashboard';
                } elseif ($_SESSION['role'] === 'admin') {
                    $dashboardLink = 'index.php?action=admin_dashboard';
                }
                ?>

                <a href="<?php echo $dashboardLink; ?>" class="nav-user">
                    <?php if (!empty($_SESSION['profile_image'])): ?>
                        <img src="uploads/profiles/<?php echo $_SESSION['profile_image']; ?>"
                            class="profile-img-sm">
                    <?php endif; ?>
                    <?php echo htmlspecialchars($_SESSION['name']); ?>
                </a>

                <a href="index.php?action=profile">Profile</a>
                    
                <a href="index.php?action=logout" class="logout">Logout</a>

            <?php else: ?>
                <a href="index.php?action=login">Login</a>
                <a href="index.php?action=register">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

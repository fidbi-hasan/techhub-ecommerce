<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');
include 'views/common/header.php';
?>
<link rel="stylesheet" href="assets/css/dashboard.css">

<div class="container">

    <div class="dashboard-header">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
        <p>Customer Dashboard</p>
    </div>

    <!-- STATS -->
    <div class="dashboard-grid">
        <div class="stat-card">
            <h3>Total Orders</h3>
            <div class="value">View</div>
        </div>
        <div class="stat-card">
            <h3>Cart Items</h3>
            <div class="value">Open</div>
        </div>
        <div class="stat-card">
            <h3>Wishlist</h3>
            <div class="value">Saved</div>
        </div>
    </div>

    <!-- ACTIONS -->
    <div class="action-grid">
        <div class="action-card">
            <h3>Browse Products</h3>
            <a href="index.php?action=products">View Products</a>
        </div>

        <div class="action-card">
            <h3>My Orders</h3>
            <a href="index.php?action=orders">View Orders</a>
        </div>

        <div class="action-card">
            <h3>Wishlist</h3>
            <a href="index.php?action=wishlist">View Wishlist</a>
        </div>

        <div class="action-card">
            <h3>My Cart</h3>
            <a href="index.php?action=cart">Go to Cart</a>
        </div>
    </div>

</div>

<?php include 'views/common/footer.php'; ?>

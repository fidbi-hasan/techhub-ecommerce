<?php
require_once 'controllers/auth_guard.php';
requireRole('seller');
include 'views/common/header.php';
?>
<link rel="stylesheet" href="assets/css/dashboard.css">

<div class="container">

    <div class="dashboard-header">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
        <p>Seller Dashboard</p>
    </div>

    <div class="dashboard-grid">
        <div class="stat-card">
            <h3>My Products</h3>
            <div class="value">Manage</div>
        </div>
        <div class="stat-card">
            <h3>Orders</h3>
            <div class="value">Track</div>
        </div>
        <div class="stat-card">
            <h3>Sales Status</h3>
            <div class="value">Active</div>
        </div>
    </div>

    <div class="action-grid">
        <div class="action-card">
            <h3>Add Product</h3>
            <a href="index.php?action=seller_products">Add New</a>
        </div>

        <div class="action-card">
            <h3>My Products</h3>
            <a href="index.php?action=seller_my_products">Manage</a>
        </div>

        <div class="action-card">
            <h3>Orders</h3>
            <a href="index.php?action=seller_orders">View Orders</a>
        </div>
    </div>

</div>

<?php include 'views/common/footer.php'; ?>

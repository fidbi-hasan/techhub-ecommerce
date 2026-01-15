<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');
include 'views/common/header.php';
?>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
    <p>Customer Dashboard</p>
    <hr>

    <div class="dashboard">
        <div class="card">
            <h3>Browse Products</h3>
            <a href="index.php?action=products">View Products</a>
        </div>

        <div class="card">
            <h3>My Orders</h3>
            <a href="index.php?action=orders">View Orders</a>
        </div>

        <div class="card">
            <h3>My Cart</h3>
            <a href="index.php?action=cart">Go to Cart</a>
        </div>

        <div class="card">
            <h3>Wishlist</h3>
            <a href="index.php?action=wishlist">View Wishlist</a>
        </div>
    </div>
</div>

<?php
require_once 'controllers/auth_guard.php';
requireRole('seller');
include 'views/common/header.php';
?>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
    <p>Seller Dashboard</p>
    <hr>

    <div class="dashboard">
        <div class="card">
            <h3>Add Product</h3>
            <a href="index.php?action=seller_products">Add New Product</a>
        </div>

        <div class="card">
            <h3>My Products</h3>
            <a href="index.php?action=seller_my_products">Manage Products</a>
        </div>

        <div class="card">
            <h3>Orders</h3>
            <a href="index.php?action=seller_orders">View Orders</a>
        </div>
    </div>
</div>

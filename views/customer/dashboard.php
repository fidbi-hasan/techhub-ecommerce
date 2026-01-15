<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');
?>

<?php include 'views/common/header.php'; ?>
<link rel="stylesheet" href="assets/css/dashboard.css">

<div class="container">
    <h2>Customer Dashboard</h2>

    <div class="dashboard">
        <div class="card">
            <h3>My Orders</h3>
            <p>View</p>
        </div>

        <div class="card">
            <h3>Cart</h3>
            <p>Open</p>
        </div>

        <div class="card">
            <h3>Wishlist</h3>
            <p>Saved</p>
        </div>
    </div>
</div>


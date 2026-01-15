<?php
require_once 'controllers/auth_guard.php';
requireRole('seller');
?>

<?php include 'views/common/header.php'; ?>
<link rel="stylesheet" href="assets/css/dashboard.css">

<div class="container">
    <h2>Seller Dashboard</h2>

    <div class="dashboard">
        <div class="card">
            <h3>My Products</h3>
            <p>Manage</p>
        </div>

        <div class="card">
            <h3>Orders</h3>
            <p>Track</p>
        </div>

        <div class="card">
            <h3>Sales Status</h3>
            <p>Active</p>
        </div>
    </div>
</div>

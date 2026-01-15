<?php
require_once 'controllers/auth_guard.php';
requireRole('admin');
?>

<?php include 'views/common/header.php'; ?>
<link rel="stylesheet" href="assets/css/dashboard.css">

<div class="container">
    <h2>Admin Dashboard</h2>

    <div class="dashboard">
        <div class="card">
            <h3>Total Users</h3>
            <p>View</p>
        </div>

        <div class="card">
            <h3>Pending Products</h3>
            <p>Review</p>
        </div>

        <div class="card">
            <h3>System Status</h3>
            <p>OK</p>
        </div>
    </div>
</div>

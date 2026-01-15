<?php
require_once 'controllers/auth_guard.php';
requireRole('admin');
include 'views/common/header.php';
?>

<div class="container">
    <h2>Welcome, Admin</h2>
    <p>System Administration</p>
    <hr>

    <div class="dashboard">
        <div class="card">
            <h3>Approve Products</h3>
            <a href="index.php?action=admin_products">Pending Products</a>
        </div>

        <div class="card">
            <h3>Manage Users</h3>
            <p>View system users</p>
        </div>

        <div class="card">
            <h3>System Status</h3>
            <p>Operational</p>
        </div>
    </div>
</div>

<?php include 'views/common/footer.php'; ?>

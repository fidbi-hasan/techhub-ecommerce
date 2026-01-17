<?php
require_once 'controllers/auth_guard.php';
requireRole('admin');
include 'views/common/header.php';

require_once 'models/User.php';
require_once 'models/Product.php';

$userCount = getTotalUserCount();
$pendingCount = getPendingProductCount();

?>
<link rel="stylesheet" href="assets/css/dashboard.css">

<div class="container">

    <div class="dashboard-header">
        <h2>Admin Dashboard</h2>
        <p>System Overview & Control</p>
    </div>

    <div class="dashboard-grid">
        <div class="stat-card">
            <h3>Pending Products</h3>
            <div class="value"><?php echo $pendingCount; ?></div>
        </div>

        <div class="stat-card">
            <h3>Total Users</h3>
            <div class="value"><?php echo $userCount; ?></div>
        </div>

        <div class="stat-card">
            <h3>System Status</h3>
            <div class="value">OK</div>
        </div>
    </div>


    <div class="action-grid">
        <div class="action-card">
            <h3>Product Moderation</h3>
            <a href="index.php?action=admin_products">Approve Products</a>
        </div>
    </div>

</div>

<?php include 'views/common/footer.php'; ?>

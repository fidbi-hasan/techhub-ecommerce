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
    <?php if (!empty($_SESSION['profile_image'])): ?>
        <img src="uploads/profiles/<?php echo $_SESSION['profile_image']; ?>"
     class="profile-img">
    <?php endif; ?>

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

    <?php
        $recentProducts = getRecentPendingProducts();
    ?>

    <h3 style="margin-top:40px;">Recent Pending Products</h3>

    <table>
        <tr>
            <th>Product</th>
            <th>Seller</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($recentProducts)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['seller_name']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>

<?php include 'views/common/footer.php'; ?>

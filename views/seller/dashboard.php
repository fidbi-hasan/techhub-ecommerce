<?php
require_once 'controllers/auth_guard.php';
requireRole('seller');
include 'views/common/header.php';

require_once 'models/Product.php';
require_once 'models/Order.php';

$productCount = getSellerProductCount($_SESSION['user_id']);
$orderCount = getSellerOrderItemCount($_SESSION['user_id']);

?>
<link rel="stylesheet" href="assets/css/dashboard.css">

<div class="container">

    <div class="dashboard-header">
    <?php if (!empty($_SESSION['profile_image'])): ?>
        <img src="uploads/profiles/<?php echo $_SESSION['profile_image']; ?>"
            width="80" height="80" style="border-radius:50% height: 80px;margin-bottom:10px;">
    <?php endif; ?>

        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
        <p>Seller Dashboard</p>
    </div>

    <div class="dashboard-grid">
        <div class="stat-card">
            <h3>My Products</h3>
            <div class="value"><?php echo $productCount; ?></div>
        </div>

        <div class="stat-card">
            <h3>Orders</h3>
            <div class="value"><?php echo $orderCount; ?></div>
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

    <?php
        $recentOrders = getRecentSellerOrderItems($_SESSION['user_id']);
    ?>

    <h3 style="margin-top:40px;">Recent Orders</h3>

    <table>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Status</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($recentOrders)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo ucfirst($row['status']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>

<?php include 'views/common/footer.php'; ?>

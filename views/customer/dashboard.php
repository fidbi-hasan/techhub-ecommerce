<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');
include 'views/common/header.php';

require_once 'models/Order.php';
require_once 'models/Wishlist.php';

$orderCount = getCustomerOrderCount($_SESSION['user_id']);
$cartCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['quantity'];
    }
}
$wishlistCount = getWishlistCount($_SESSION['user_id']);

?>
<link rel="stylesheet" href="assets/css/dashboard.css">

<div class="container">

    <div class="dashboard-header">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
        <p>Customer Dashboard</p>
    </div>

    <!-- STATS -->
    <div class="dashboard-grid">
        <div class="stat-card">
            <h3>Total Orders</h3>
            <div class="value"><?php echo $orderCount; ?></div>
        </div>

        <div class="stat-card">
            <h3>Cart Items</h3>
            <div class="value"><?php echo $cartCount; ?></div>
        </div>

        <div class="stat-card">
            <h3>Wishlist Items</h3>
            <div class="value"><?php echo $wishlistCount; ?></div>
        </div>
    </div>


    <!-- ACTIONS -->
    <div class="action-grid">
        <div class="action-card">
            <h3>Browse Products</h3>
            <a href="index.php?action=products">View Products</a>
        </div>

        <div class="action-card">
            <h3>My Orders</h3>
            <a href="index.php?action=orders">View Orders</a>
        </div>

        <div class="action-card">
            <h3>Wishlist</h3>
            <a href="index.php?action=wishlist">View Wishlist</a>
        </div>

        <div class="action-card">
            <h3>My Cart</h3>
            <a href="index.php?action=cart">Go to Cart</a>
        </div>
    </div>

    <?php
        $recentOrders = getRecentCustomerOrders($_SESSION['user_id']);
    ?>

    <h3 style="margin-top:40px;">Recent Orders</h3>

    <table>
        <tr>
            <th>Order ID</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($recentOrders)): ?>
            <tr>
                <td>#<?php echo $row['id']; ?></td>
                <td><?php echo ucfirst($row['status']); ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>

<?php include 'views/common/footer.php'; ?>

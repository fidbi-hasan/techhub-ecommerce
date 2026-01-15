<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');

require_once 'models/Order.php';

$orders = getCustomerOrders($_SESSION['user_id']);
?>

<h2>My Orders</h2>

<?php if (mysqli_num_rows($orders) == 0): ?>
    <p>No orders yet.</p>
<?php else: ?>

<table border="1" cellpadding="10">
    <tr>
        <th>Order ID</th>
        <th>Total</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($orders)): ?>
        <tr>
            <td>#<?php echo $row['id']; ?></td>
            <td>$<?php echo $row['total_price']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
    <?php endwhile; ?>

</table>

<?php endif; ?>

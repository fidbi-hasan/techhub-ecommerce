<?php
require_once 'controllers/auth_guard.php';
requireRole('seller');

require_once 'models/Order.php';

$orders = getSellerOrders($_SESSION['user_id']);
?>

<h2>My Orders</h2>

<?php if (mysqli_num_rows($orders) == 0): ?>
    <p>No orders yet.</p>
<?php else: ?>

<table border="1" cellpadding="10">
    <tr>
        <th>Order ID</th>
        <th>Product</th>
        <th>Qty</th>
        <th>Status</th>
        <th>Date</th>
        <th>Update</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($orders)): ?>
        <tr>
            <td>#<?php echo $row['order_id']; ?></td>
            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <?php if ($row['status'] !== 'delivered'): ?>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                        <select name="status">
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                <?php endif; ?>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

<?php endif; ?>

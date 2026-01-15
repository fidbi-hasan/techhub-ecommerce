<?php
require_once 'controllers/auth_guard.php';
requireRole('seller');

require_once 'models/Order.php';
include 'views/common/header.php';

$orders = getSellerOrders($_SESSION['user_id']);
?>

<div class="container">
    <h2>My Orders</h2>

    <?php if (mysqli_num_rows($orders) === 0): ?>
        <p>No orders yet.</p>
    <?php else: ?>

        <table>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Image</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Date</th>
                <th>Update</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($orders)): ?>
                <tr>
                    <td>#<?php echo $row['order_id']; ?></td>

                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>

                    <td>
                        <?php if ($row['image']): ?>
                            <img src="uploads/products/<?php echo $row['image']; ?>" width="60">
                        <?php endif; ?>
                    </td>

                    <td><?php echo $row['quantity']; ?></td>

                    <td><?php echo ucfirst($row['status']); ?></td>

                    <td><?php echo $row['created_at']; ?></td>

                    <td>
                        <?php if ($row['status'] !== 'shipped'): ?>
                            <form method="POST" style="display:flex; gap:6px;">
                                <input type="hidden" name="order_item_id"
                                       value="<?php echo $row['order_item_id']; ?>">

                                <select name="status">
                                    <option value="processing">Processing</option>
                                    <option value="shipped">Shipped</option>
                                </select>

                                <button type="submit">Update</button>
                            </form>
                        <?php else: ?>
                            <span>Completed</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>

        </table>

    <?php endif; ?>
</div>

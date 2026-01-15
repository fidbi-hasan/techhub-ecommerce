<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');

require_once 'models/Order.php';
include 'views/common/header.php';

$orders = getCustomerOrderItems($_SESSION['user_id']);
?>

<div class="container">
    <h2>My Orders</h2>

    <?php if (mysqli_num_rows($orders) === 0): ?>
        <p>You have not placed any orders yet.</p>
    <?php else: ?>

        <table>
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Status</th>
                <th>Date</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($orders)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>

                    <td>
                        <?php if ($row['image']): ?>
                            <img src="uploads/products/<?php echo $row['image']; ?>" width="60">
                        <?php endif; ?>
                    </td>

                    <td><?php echo $row['quantity']; ?></td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td><?php echo ucfirst($row['status']); ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php endwhile; ?>

        </table>

    <?php endif; ?>
</div>

<?php include 'views/common/footer.php'; ?>

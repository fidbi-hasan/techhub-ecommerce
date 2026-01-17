<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');

require_once 'models/Order.php';
include 'views/common/header.php';

$order_id = $_GET['id'];
$items = getOrderItemsByOrderId($order_id);
?>

<div class="container">
    <h2>Order #<?php echo $order_id; ?> Details</h2>

    <table>
        <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Status</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($items)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>

                <td>
                    <?php if ($row['image']): ?>
                        <img src="uploads/products/<?php echo $row['image']; ?>" width="60">
                    <?php endif; ?>
                </td>

                <td><?php echo $row['quantity']; ?></td>
                <td>$<?php echo $row['price']; ?></td>

                <td>
                    <span class="badge badge-<?php echo $row['status']; ?>">
                        <?php echo $row['status']; ?>
                    </span>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include 'views/common/footer.php'; ?>

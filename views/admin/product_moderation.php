<?php
require_once 'controllers/auth_guard.php';
requireRole('admin');

require_once 'models/Product.php';

$products = getPendingProducts();
?>

<h2>Pending Products</h2>

<?php if (mysqli_num_rows($products) == 0): ?>
    <p>No pending products.</p>
<?php else: ?>

<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Seller ID</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($products)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td>$<?php echo $row['price']; ?></td>
            <td><?php echo $row['seller_id']; ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="status" value="approved">
                    <button type="submit">Approve</button>
                </form>

                <form method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="status" value="rejected">
                    <button type="submit">Reject</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

<?php endif; ?>

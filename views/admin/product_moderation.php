<?php
require_once 'controllers/auth_guard.php';
requireRole('admin');

require_once 'models/Product.php';
include 'views/common/header.php';

$products = getPendingProducts();
?>

<div class="container">
    <h2>Pending Products</h2>

    <?php if (mysqli_num_rows($products) === 0): ?>
        <p>No pending products.</p>
    <?php else: ?>

        <table>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Seller</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($products)): ?>
                <tr>
                    <td>
                        <?php if ($row['image']): ?>
                            <img src="uploads/products/<?php echo $row['image']; ?>" width="60">
                        <?php endif; ?>
                    </td>

                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td><?php echo htmlspecialchars($row['seller_name']); ?></td>

                    <td>
                        <form method="POST" style="display:flex; gap:6px;">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">

                            <button type="submit" name="status" value="approved">
                                Approve
                            </button>

                            <button type="submit" name="status" value="rejected" class="danger">
                                Reject
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>

        </table>

    <?php endif; ?>
</div>

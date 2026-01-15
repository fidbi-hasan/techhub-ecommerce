<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');

require_once 'models/Wishlist.php';
include 'views/common/header.php';

$items = getWishlistItems($_SESSION['user_id']);
?>

<div class="container">
    <h2>My Wishlist</h2>

    <?php if (mysqli_num_rows($items) === 0): ?>
        <p>Your wishlist is empty.</p>
    <?php else: ?>

        <table>
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($items)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>

                    <td>
                        <?php if ($row['image']): ?>
                            <img src="uploads/products/<?php echo $row['image']; ?>" width="60">
                        <?php endif; ?>
                    </td>

                    <td>$<?php echo $row['price']; ?></td>

                    <td>
                        <form method="POST" action="index.php?action=add_to_cart">
                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>

        </table>

    <?php endif; ?>
</div>

<?php
require_once 'controllers/auth_guard.php';
requireRole('seller');
require_once 'models/Product.php';
include 'views/common/header.php';

$seller_id = $_SESSION['user_id'];
$products = getProductsBySeller($seller_id);
?>

<div class="container">
    <h2>My Products</h2>

    <?php if (mysqli_num_rows($products) === 0): ?>
        <p>No products added yet.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($products)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td><?php echo ucfirst($row['status']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</div>

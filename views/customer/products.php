<?php
// customer OR guest can access
require_once 'models/Product.php';

$products = getApprovedProducts();
?>
<?php include 'views/common/header.php'; ?>
<div class="container">


<h2>Products</h2>

<?php if (mysqli_num_rows($products) == 0): ?>
    <p>No products available.</p>
<?php else: ?>

<table border="1" cellpadding="10">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($products)): ?>
        <tr>
            <td>
                <?php if ($row['image']): ?>
                    <img src="uploads/products/<?php echo $row['image']; ?>" width="80">
                <?php endif; ?>
            </td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td>$<?php echo $row['price']; ?></td>
            <td>
                <a href="index.php?action=product_details&id=<?php echo $row['id']; ?>">
                    View
                </a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

<?php endif; ?>
</div>


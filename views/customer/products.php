<?php
// customer OR guest can access
require_once 'models/Product.php';

$products = getApprovedProducts();
?>
<?php include 'views/common/header.php'; ?>
<link rel="stylesheet" href="assets/css/products.css">

<div class="container">
    <h2>Products</h2>

    <div class="product-grid">
        <?php while ($row = mysqli_fetch_assoc($products)): ?>
            <div class="product-card">
                <?php if ($row['image']): ?>
                    <img src="uploads/products/<?php echo $row['image']; ?>">
                <?php endif; ?>

                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p>$<?php echo $row['price']; ?></p>

                <a href="index.php?action=product_details&id=<?php echo $row['id']; ?>">
                    View Details
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'views/common/footer.php'; ?>


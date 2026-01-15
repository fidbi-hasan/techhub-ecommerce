<?php include 'views/common/header.php'; ?>
<link rel="stylesheet" href="assets/css/products.css">

<div class="container">
    <h1>Welcome to TechHub</h1>
    <p>Your trusted multi-vendor e-commerce platform.</p>

    <hr class="mt-20 mb-20">

    <h2>Featured Products</h2>

    <div class="product-grid">
        <?php
        require_once 'models/Product.php';
        $products = getApprovedProducts();
        $count = 0;
        while ($row = mysqli_fetch_assoc($products)):
            if ($count++ == 4) break;
        ?>
            <div class="product-card">
                <?php if ($row['image']): ?>
                    <img src="uploads/products/<?php echo $row['image']; ?>">
                <?php endif; ?>

                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p>$<?php echo $row['price']; ?></p>

                <a href="index.php?action=product_details&id=<?php echo $row['id']; ?>">
                    View
                </a>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="mt-20">
        <a href="index.php?action=products" class="btn">Browse All Products</a>
    </div>
</div>

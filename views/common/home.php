<?php include 'views/common/header.php'; ?>
<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/products.css">

<!-- HERO SECTION -->
<section class="hero">
    <h1>TechHub E-Commerce Platform</h1>
    <p>
        A simple, secure, multi-vendor e-commerce platform where customers can shop,
        sellers can manage products, and admins control the system.
    </p>

    <a href="index.php?action=products">Browse Products</a>
    <a href="index.php?action=register">Get Started</a>
</section>

<!-- FEATURES SECTION -->
<section class="section">
    <div class="container">
        <h2>Why Choose TechHub?</h2>

        <div class="features">
            <div class="feature-box">
                <h3>Multi-Vendor</h3>
                <p>Multiple sellers can list and manage their products independently.</p>
            </div>

            <div class="feature-box">
                <h3>Secure Authentication</h3>
                <p>Role-based access with secure session handling.</p>
            </div>

            <div class="feature-box">
                <h3>Easy Checkout</h3>
                <p>Simple cart and order system for customers.</p>
            </div>

            <div class="feature-box">
                <h3>Admin Control</h3>
                <p>Admins approve products and monitor the platform.</p>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="section">
    <div class="container">
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
                        View Product
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<!-- CALL TO ACTION -->
<section class="cta">
    <h2>Ready to start?</h2>
    <p>Create an account and explore the platform today.</p>
    <a href="index.php?action=register" class="btn">Register Now</a>
</section>

<?php include 'views/common/footer.php'; ?>

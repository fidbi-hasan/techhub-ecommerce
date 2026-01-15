<?php
require_once 'models/Product.php';

if (!isset($_GET['id'])) {
    die("Product not found");
}

$product = getProductById($_GET['id']);

if (!$product) {
    die("Product not found");
}
?>

<h2><?php echo htmlspecialchars($product['name']); ?></h2>

<?php if ($product['image']): ?>
    <img src="uploads/products/<?php echo $product['image']; ?>" width="200"><br><br>
<?php endif; ?>

<p><strong>Price:</strong> $<?php echo $product['price']; ?></p>

<p><strong>Description:</strong><br>
<?php echo nl2br(htmlspecialchars($product['description'])); ?>
</p>

<?php if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'customer'): ?>
    <form method="POST" action="index.php?action=add_to_cart">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <button type="submit">Add to Cart</button>
        <button type="button" onclick="addToWishlist(<?php echo $product['id']; ?>)">
            Add to Wishlist
        </button>


        <p id="wishlist_msg"></p>

        <script src="assets/js/wishlist.js"></script>
    </form>
<?php else: ?>
    <p><a href="index.php?action=login">Login to add to cart</a></p>
<?php endif; ?>

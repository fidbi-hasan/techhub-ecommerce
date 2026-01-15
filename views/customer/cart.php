<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');

require_once 'models/Product.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<?php include 'views/common/header.php'; ?>
<div class="container">

<h2>Your Cart</h2>

<?php if (empty($cart)): ?>
    <p>Cart is empty.</p>
<?php else: ?>

<table border="1" cellpadding="10">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Subtotal</th>
        <th>Action</th>
    </tr>

    <?php foreach ($cart as $product_id => $qty): ?>
        <?php
        $product = getProductByIdForCart($product_id);

        if (!$product) {
            continue;
        }
        
        $subtotal = $product['price'] * $qty;
        $total += $subtotal;
        ?>
        <tr>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td>$<?php echo $product['price']; ?></td>
            <td><?php echo $qty; ?></td>
            <td>$<?php echo $subtotal; ?></td>
            <td>
                <a href="index.php?action=remove_from_cart&id=<?php echo $product_id; ?>">
                    Remove
                </a>
            </td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td colspan="2"><strong>$<?php echo $total; ?></strong></td>
    </tr>
</table>

<a href="index.php?action=checkout">Proceed to Checkout</a>

<?php endif; ?>
</div>

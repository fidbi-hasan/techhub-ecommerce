<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');
?>

<?php include 'views/common/header.php'; ?>
<div class="container">

<h2>Checkout</h2>

<p>Confirm your order.</p>

<form method="POST" action="index.php?action=place_order">
    <button type="submit">Place Order</button>
</form>
</div>

<?php include 'views/common/footer.php'; ?>

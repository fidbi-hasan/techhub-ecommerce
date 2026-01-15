<?php
require_once 'controllers/auth_guard.php';
requireRole('customer');
?>

<h2>Checkout</h2>

<p>Confirm your order.</p>

<form method="POST" action="index.php?action=place_order">
    <button type="submit">Place Order</button>
</form>

<?php
require_once 'controllers/auth_guard.php';
requireRole('seller');
?>

<h2>Add Product</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Product Name"><br><br>

    <textarea name="description" placeholder="Description"></textarea><br><br>

    <input type="number" name="price" step="0.01" placeholder="Price"><br><br>

    <input type="number" name="stock" placeholder="Stock"><br><br>

    <input type="file" name="image"><br><br>

    <button type="submit">Add Product</button>
</form>

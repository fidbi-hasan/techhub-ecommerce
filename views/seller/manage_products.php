<?php
require_once 'controllers/auth_guard.php';
requireRole('seller');
include 'views/common/header.php';
?>

<div class="container">
    <h2>Add New Product</h2>

    <form method="POST" enctype="multipart/form-data" class="form-box">
        <label>Product Name</label>
        <input type="text" name="name" required>

        <label>Description</label>
        <textarea name="description" rows="4"></textarea>

        <label>Price</label>
        <input type="number" step="0.01" name="price" required>

        <label>Stock</label>
        <input type="number" name="stock" required>

        <label>Product Image</label>
        <input type="file" name="image">

        <button type="submit">Add Product</button>
    </form>
</div>

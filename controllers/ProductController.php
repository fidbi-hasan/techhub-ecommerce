<?php
require_once 'models/Product.php';

function handleAddProduct() {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $seller_id   = $_SESSION['user_id'];
        $name        = trim($_POST['name']);
        $description = trim($_POST['description']);
        $price       = $_POST['price'];
        $stock       = $_POST['stock'];

        if ($name === '' || $price === '' || $stock === '') {
            die("Required fields missing");
        }

        $imageName = null;

        if (!empty($_FILES['image']['name'])) {
            $imageName = time() . "_" . $_FILES['image']['name'];
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                "uploads/products/" . $imageName
            );
        }

        addProduct($seller_id, $name, $description, $price, $stock, $imageName);

        header("Location: index.php?action=seller_products");
        exit;
    }
}

function showProducts() {
    return getApprovedProducts();
}

function showProductDetails($id) {
    return getProductById($id);
}


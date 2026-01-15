<?php
require_once 'models/Product.php';

function addToCart() {

    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
        header("Location: index.php?action=login");
        exit;
    }

    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }

    header("Location: index.php?action=cart");
    exit;
}

function removeFromCart() {
    $product_id = $_GET['id'];

    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }

    header("Location: index.php?action=cart");
    exit;
}

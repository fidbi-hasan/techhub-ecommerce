<?php
require_once 'models/Order.php';
require_once 'models/Product.php';

function placeOrder() {

    require_once 'controllers/auth_guard.php';
    requireRole('customer');

    if (empty($_SESSION['cart'])) {
        die("Cart is empty");
    }

    $customer_id = $_SESSION['user_id'];
    $total = 0;

    foreach ($_SESSION['cart'] as $product_id => $qty) {
        $product = getProductByIdForCart($product_id);
        if ($product) {
            $total += $product['price'] * $qty;
        }
    }

    $order_id = createOrder($customer_id, $total);

    foreach ($_SESSION['cart'] as $product_id => $qty) {
        $product = getProductByIdForCart($product_id);
        if ($product) {
            addOrderItem(
                $order_id,
                $product_id,
                $product['seller_id'],
                $qty,
                $product['price']
            );
        }
    }

    unset($_SESSION['cart']);

    header("Location: index.php?action=orders");
    exit;
}

function handleSellerOrderStatus() {

    require_once 'controllers/auth_guard.php';
    requireRole('seller');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $order_item_id = $_POST['order_item_id'];
        $status        = $_POST['status'];

        if (!in_array($status, ['processing', 'shipped'])) {
            die("Invalid status");
        }

        updateOrderItemStatus($order_item_id, $status);

        header("Location: index.php?action=seller_orders");
        exit;
    }
}


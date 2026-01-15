<?php
require_once 'db.php';

function createOrder($customer_id, $total_price) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO orders (customer_id, total_price) VALUES (?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "id", $customer_id, $total_price);
    mysqli_stmt_execute($stmt);

    return mysqli_insert_id($conn);
}

function addOrderItem($order_id, $product_id, $seller_id, $quantity, $price) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO order_items (order_id, product_id, seller_id, quantity, price)
         VALUES (?, ?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "iiiid",
        $order_id, $product_id, $seller_id, $quantity, $price
    );

    return mysqli_stmt_execute($stmt);
}

function getCustomerOrders($customer_id) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM orders WHERE customer_id = ? ORDER BY created_at DESC"
    );
    mysqli_stmt_bind_param($stmt, "i", $customer_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}

function getSellerOrders($seller_id) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT 
            oi.id AS order_item_id,
            oi.status,
            o.id AS order_id,
            o.created_at,
            p.name AS product_name,
            p.image,
            oi.quantity
         FROM order_items oi
         JOIN orders o ON oi.order_id = o.id
         JOIN products p ON oi.product_id = p.id
         WHERE oi.seller_id = ?
         ORDER BY o.created_at DESC"
    );

    mysqli_stmt_bind_param($stmt, "i", $seller_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}


function updateOrderItemStatus($order_item_id, $status) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE order_items SET status = ? WHERE id = ?"
    );
    mysqli_stmt_bind_param($stmt, "si", $status, $order_item_id);

    return mysqli_stmt_execute($stmt);
}

function getCustomerOrderItems($customer_id) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT 
            o.id AS order_id,
            o.status,
            o.created_at,
            p.name AS product_name,
            p.image,
            oi.quantity,
            oi.price
         FROM orders o
         JOIN order_items oi ON o.id = oi.order_id
         JOIN products p ON oi.product_id = p.id
         WHERE o.customer_id = ?
         ORDER BY o.created_at DESC"
    );

    mysqli_stmt_bind_param($stmt, "i", $customer_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}



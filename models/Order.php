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

function getCustomerOrderCount($customer_id) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT COUNT(*) AS total FROM orders WHERE customer_id = ?"
    );
    mysqli_stmt_bind_param($stmt, "i", $customer_id);
    mysqli_stmt_execute($stmt);

    return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))['total'];
}

function getSellerOrderItemCount($seller_id) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT COUNT(*) AS total FROM order_items WHERE seller_id = ?"
    );
    mysqli_stmt_bind_param($stmt, "i", $seller_id);
    mysqli_stmt_execute($stmt);

    return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))['total'];
}

function getRecentCustomerOrders($customer_id, $limit = 3) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, status, created_at
         FROM orders
         WHERE customer_id = ?
         ORDER BY created_at DESC
         LIMIT ?"
    );
    mysqli_stmt_bind_param($stmt, "ii", $customer_id, $limit);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}

function getRecentSellerOrderItems($seller_id, $limit = 3) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT 
            p.name AS product_name,
            oi.quantity,
            oi.status
         FROM order_items oi
         JOIN products p ON oi.product_id = p.id
         WHERE oi.seller_id = ?
         ORDER BY oi.id DESC
         LIMIT ?"
    );
    mysqli_stmt_bind_param($stmt, "ii", $seller_id, $limit);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}

function getRecentPendingProducts($limit = 3) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT p.name, u.name AS seller_name
         FROM products p
         JOIN users u ON p.seller_id = u.id
         WHERE p.status = 'pending'
         ORDER BY p.created_at DESC
         LIMIT ?"
    );
    mysqli_stmt_bind_param($stmt, "i", $limit);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}

function updateOrderStatusFromItems($order_id) {
    global $conn;

    $query = "
        SELECT 
            SUM(status = 'pending') AS pending_count,
            SUM(status = 'processing') AS processing_count,
            SUM(status = 'shipped') AS shipped_count,
            COUNT(*) AS total
        FROM order_items
        WHERE order_id = ?
    ";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    if ($result['shipped_count'] == $result['total']) {
        $newStatus = 'shipped';
    } elseif ($result['processing_count'] > 0) {
        $newStatus = 'processing';
    } else {
        $newStatus = 'pending';
    }

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE orders SET status = ? WHERE id = ?"
    );
    mysqli_stmt_bind_param($stmt, "si", $newStatus, $order_id);
    mysqli_stmt_execute($stmt);
}


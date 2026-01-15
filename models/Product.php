<?php
require_once 'db.php';

function addProduct($seller_id, $name, $description, $price, $stock, $image) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO products (seller_id, name, description, price, stock, image)
         VALUES (?, ?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "issdis",
        $seller_id,
        $name,
        $description,
        $price,
        $stock,
        $image
    );

    return mysqli_stmt_execute($stmt);
}

function getApprovedProducts() {
    global $conn;

    $query = "SELECT * FROM products WHERE status = 'approved' ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);

    return $result;
}

function getProductById($id) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM products WHERE id = ? AND status = 'approved'"
    );
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
}


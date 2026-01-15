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

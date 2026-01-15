<?php
require_once 'db.php';

function addWishlist($user_id, $product_id) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $product_id);
    return mysqli_stmt_execute($stmt);
}

function getWishlistItems($user_id) {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT 
            w.id AS wishlist_id,
            p.id AS product_id,
            p.name,
            p.price,
            p.image
         FROM wishlist w
         JOIN products p ON w.product_id = p.id
         WHERE w.user_id = ?"
    );

    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}

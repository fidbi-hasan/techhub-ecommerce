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

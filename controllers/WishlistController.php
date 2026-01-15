<?php
header("Content-Type: application/json");

session_start();
require_once '../models/Wishlist.php';

$response = ["status" => "error"];

$product_id = $_POST['product_id'] ?? null;

if (!$product_id) {
    echo json_encode($response);
    exit;
}

/* CUSTOMER */
if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'customer') {
    addWishlist($_SESSION['user_id'], $product_id);
    $response["status"] = "success";
    $response["message"] = "Added to wishlist";
}

/* GUEST */
else {
    $wishlist = json_decode($_COOKIE['guest_wishlist'] ?? '[]', true);
    $wishlist[] = $product_id;

    setcookie(
        'guest_wishlist',
        json_encode($wishlist),
        time() + (86400 * 7),
        "/"
    );

    $response["status"] = "success";
    $response["message"] = "Added to wishlist (guest)";
}

echo json_encode($response);

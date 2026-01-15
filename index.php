<?php
session_start();

require_once 'controllers/authController.php';
require_once 'controllers/auth_guard.php';
require_once 'controllers/productController.php';
require_once 'controllers/cartController.php';
require_once 'controllers/orderController.php';

$action = $_GET['action'] ?? 'home';

switch ($action) {

    case 'customer_dashboard':
        requireRole('customer');
        require 'views/customer/dashboard.php';
        break;

    case 'seller_dashboard':
        requireRole('seller');
        require 'views/seller/dashboard.php';
        break;

    case 'admin_dashboard':
        requireRole('admin');
        require 'views/admin/dashboard.php';
        break;

    case 'login':
        require 'views/auth/login.php';
        handleLogin();
        break;

    case 'register':
        require 'views/auth/registration.php';
        handleRegister();
        break;

    case 'logout':
        handleLogout();
        break;
    
    case 'seller_products':
        requireRole('seller');
        require 'views/seller/manage_products.php';
        handleAddProduct();
        break;
    
    case 'products':
        require 'views/customer/products.php';
        break;
    
    case 'product_details':
        require 'views/customer/product_details.php';
        break;

    case 'admin_products':
        requireRole('admin');
        require 'views/admin/product_moderation.php';
        handleProductApproval();
        break;

    case 'add_to_cart':
        addToCart();
        break;

    case 'cart':
        require 'views/customer/cart.php';
        break;

    case 'remove_from_cart':
        removeFromCart();
        break;

    case 'checkout':
        require 'views/customer/checkout.php';
        break;

    case 'place_order':
        placeOrder();
        break;

    case 'orders':
        require 'views/customer/orders.php';
        break;

    case 'seller_orders':
        require 'views/seller/orders.php';
        handleSellerOrderStatus();
        break;

    case 'home':
        require 'views/common/home.php';
        break;

    case 'seller_my_products':
        require 'views/seller/my_products.php';
        break;
    
    case 'forgot_password':
        require 'views/auth/forgot_password.php';
        handleForgotPassword();
        break;

    case 'reset_password':
        require 'views/auth/reset_password.php';
        handleResetPassword();
        break;

    default:
        require 'views/errors/404.php';
}






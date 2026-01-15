<?php
session_start();

require_once 'controllers/auth_controller.php';
require_once 'controllers/auth_guard.php';

$action = $_GET['action'] ?? 'login';

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
        require 'views/auth/register.php';
        handleRegister();
        break;

    case 'logout':
        handleLogout();
        break;

    default:
        require 'views/errors/404.php';
}

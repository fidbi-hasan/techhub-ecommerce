<?php
session_start();

require_once 'controllers/auth_controller.php';

$action = $_GET['action'] ?? 'login';

switch ($action) {

    case 'register':
        require 'views/auth/register.php';
        handleRegister();
        break;

    case 'login':
        require 'views/auth/login.php';
        handleLogin();
        break;

    case 'logout':
        handleLogout();
        break;

    default:
        require 'views/errors/404.php';
}

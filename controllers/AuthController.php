<?php
require_once 'models/user_model.php';

function handleRegister() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name  = trim($_POST['name']);
        $email = trim($_POST['email']);
        $pass  = $_POST['password'];
        $role  = $_POST['role'];

        if ($name == '' || $email == '' || $pass == '') {
            die("All fields required");
        }

        if (getUserByEmail($email)) {
            die("Email already exists");
        }

        $hashed = password_hash($pass, PASSWORD_DEFAULT);
        createUser($name, $email, $hashed, $role);

        header("Location: index.php?action=login");
        exit;
    }
}

function handleLogin() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = trim($_POST['email']);
        $pass  = $_POST['password'];

        $user = getUserByEmail($email);

        if (!$user || !password_verify($pass, $user['password'])) {
            die("Invalid credentials");
        }

        if ($user['status'] === 'blocked') {
            die("Account blocked");
        }

        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role']    = $user['role'];
        $_SESSION['name']    = $user['name'];

        if ($user['role'] === 'admin') {
            header("Location: index.php?action=admin_dashboard");
        } elseif ($user['role'] === 'seller') {
            header("Location: index.php?action=seller_dashboard");
        } else {
            header("Location: index.php?action=customer_dashboard");
        }
        exit;
    }
}

function handleLogout() {
    session_unset();
    session_destroy();
    header("Location: index.php?action=login");
    exit;
}

<?php
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?action=login");
        exit;
    }
}

function requireRole($role) {
    requireLogin();

    if ($_SESSION['role'] !== $role) {
        header("Location: views/errors/403.php");
        exit;
    }
}

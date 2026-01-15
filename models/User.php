<?php
require_once 'db.php';

function getUserByEmail($email) {
    global $conn;
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
}

function createUser($name, $email, $password, $role) {
    global $conn;
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $role);
    return mysqli_stmt_execute($stmt);
}

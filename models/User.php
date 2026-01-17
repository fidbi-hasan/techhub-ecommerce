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

function updatePasswordByEmail($email, $newPassword) {
    global $conn;

    $hashed = password_hash($newPassword, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE users SET password = ? WHERE email = ?"
    );
    mysqli_stmt_bind_param($stmt, "ss", $hashed, $email);

    return mysqli_stmt_execute($stmt);
}

function getTotalUserCount() {
    global $conn;
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
    return mysqli_fetch_assoc($result)['total'];
}

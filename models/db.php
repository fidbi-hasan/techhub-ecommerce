<?php
$conn = mysqli_connect("localhost", "root", "", "techhub_ecommerce");

if (!$conn) {
    die("Database connection failed");
}

<?php
session_start();
include './DS/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lưu dữ liệu địa chỉ vào session
    $_SESSION['address'] = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'country' => $_POST['country'],
        'city' => $_POST['city'],
        'district' => $_POST['district'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
        'address_type' => $_POST['address_type'],
    ];

    header("Location: stk.php");
    exit();
}
?>

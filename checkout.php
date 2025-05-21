<?php
session_start();
include './DS/connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_SESSION['address'])) {
        header("Location: thanhtoan.php");
        exit();
    }

    $address = $_SESSION['address'];

    $fullname = $address['name'];
    $email = $address['email'];
    $country = $address['country'];
    $city = $address['city'];
    $district = $address['district'];
    $address_detail = $address['address'];
    $phone = $address['phone'];
    $address_type = $address['address_type'];

    $shipping = $_POST['shipping'] ?? '';
    $payment = $_POST['payment'] ?? '';
    $note = $_POST['note'] ?? '';

    if (!$shipping || !$payment) {
        echo "<script>alert('Vui lòng chọn phương thức vận chuyển và thanh toán'); window.history.back();</script>";
        exit();
    }

    // Debug in case
    // var_dump($fullname, $email, $country, $city, $district, $address_detail, $phone, $address_type, $note, $shipping, $payment);
    // exit();

    $stmt = $conn->prepare("INSERT INTO orders (fullname, email, country, city, district, address, phone, address_type, note, shipping_method, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Lỗi prepare statement: " . htmlspecialchars($conn->error));
    }

    $bind = $stmt->bind_param("sssssssssss", $fullname, $email, $country, $city, $district, $address_detail, $phone, $address_type, $note, $shipping, $payment);
    if ($bind === false) {
        die("Lỗi bind_param: " . htmlspecialchars($stmt->error));
    }

    if ($stmt->execute()) {
        unset($_SESSION['address']);
        unset($_SESSION['note']);
        header("Location: thankyou.php");
        exit();
    } else {
        die("Lỗi khi lưu đơn hàng: " . htmlspecialchars($stmt->error));
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: thanhtoan.php");
    exit();
}

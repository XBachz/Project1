<?php
session_start();
include '../DS/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $email = trim($_POST['txtmail']);
    $password = trim($_POST['txtpass']);

    // Kiểm tra rỗng
    if (empty($email) || empty($password)) {
        echo "Vui lòng nhập đầy đủ email và mật khẩu. <a href='../dangnhap.php'>Thử lại</a>";
        exit;
    }

    // Sử dụng prepared statement để tránh SQL injection
    $stmt = $conn->prepare("SELECT * FROM dn WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['dn'] = $user['name'];
        header("Location: ../trangchudex.php");
        exit;
    } else {
        echo "Sai email hoặc mật khẩu. <a href='../dangnhap.php'>Thử lại</a>";
    }

    $stmt->close();
    $conn->close();
}
?>

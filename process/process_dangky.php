<?php
include '../DS/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form và chống SQL Injection cơ bản
    $name = $conn->real_escape_string($_POST['txtname']);
    $email = $conn->real_escape_string($_POST['txtmail']);
    $password = $conn->real_escape_string($_POST['txtpass']);

    // Tạo câu lệnh SQL
    $sql = "INSERT INTO dn (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Đăng ký thành công!');
            window.location.href = '../dangnhap.php';
        </script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<?php
session_start();
// Đảm bảo đường dẫn đến file kết nối database là chính xác
require_once '../DS/connect.php'; 

// 1. Logic kiểm tra/hiển thị thông báo (nếu có từ order_complete.php)
$message = '';
if (isset($_SESSION['msg'])) {
    $message = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

// 2. Lấy danh sách đơn hàng
$query = "SELECT * FROM orders ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// 3. Xử lý lỗi khi truy vấn
if (!$result) {
    die("Lỗi truy vấn đơn hàng: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý đơn hàng - Admin</title>
    <link rel="stylesheet" href="CSS/Giohang.css">
    <link rel="stylesheet" href="../font/css/all.css">
    <style>
        .admin-container {
            padding: 20px;
            max-width: 1200px;
            margin: 40px auto;
        }

        .admin-header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin: auto;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #7d5ba6;
            color: white;
        }

        .top-bar {
            background-color: #7d5ba6;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
        }

        .top-bar a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <div class="header">
        <div class="top-bar">
            <div>
                <a href="admin_home.php"><i class="fa-solid fa-house-user"></i> Trang chủ</a>
                <a href="admin_orders.php"><i class="fa-solid fa-file-invoice"></i> Quản lý đơn hàng</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
            </div>
            <div>
                <span><i class="fa-solid fa-user-shield"></i> Admin</span>
            </div>
        </div>
    </div>

    <div class="admin-container">
        <div class="admin-header">
            <h2>Danh sách đơn hàng</h2>
        </div>

       <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Ghi chú</th>
            <th>Giao hàng</th>
            <th>Thanh toán</th>
            <th>Ngày đặt</th>
            <th>Hoàn thành</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['fullname']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['address']) . ', ' . htmlspecialchars($row['district']) . ', ' . htmlspecialchars($row['city']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['note']) ?></td>
                <td><?= htmlspecialchars($row['shipping_method']) ?></td>
                <td><?= htmlspecialchars($row['payment_method']) ?></td>
                <td><?= $row['created_at'] ?></td>

                <!-- Cột hoàn thành -->
                <td>
                    <a href="order_complete.php?id=<?= $row['id'] ?>"
                       onclick="return confirm('Xác nhận hoàn thành đơn hàng?');"
                       style="padding:6px 10px;background:#28a745;color:white;border-radius:4px;text-decoration:none;">
                        ✔
                    </a>
                </td>

                <!-- Cột xóa -->
                <td>
                    <a href="order_delete.php?id=<?= $row['id'] ?>"
                       onclick="return confirm('Bạn chắc chắn muốn xóa đơn hàng này?');"
                       style="padding:6px 10px;background:#dc3545;color:white;border-radius:4px;text-decoration:none;">
                        ✖
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
    </div>
     <script>
        // Hàm này chạy khi nhấp vào nút "Hoàn thành"
        function changeToShipping(element, id) {
            // Hiệu ứng Frontend tức thời: Đổi chữ nút
            element.textContent = "Vận chuyển";
            element.style.backgroundColor = '#ffc107'; // Đổi màu sang Vận chuyển (vàng)

            // Ngăn chặn gọi lại hàm này lần nữa
            element.onclick = null; 
            
            // Cho phép link HREF (order_complete.php?id=...) được thực thi để cập nhật database
            return true; 
        }

        // Thay thế lệnh confirm() bị cấm bằng custom prompt nhẹ nhàng
        function deleteConfirmation(id) {
            const result = prompt("Bạn chắc chắn muốn xóa đơn hàng ID " + id + "? (Nhập 'XOA' để xác nhận)");
            if (result === 'XOA') {
                return true; // Cho phép link HREF (order_delete.php?id=...) được thực thi
            }
            return false;
        }
    </script>
</body>
</html>

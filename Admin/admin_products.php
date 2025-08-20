<?php
session_start();
require_once '../DS/connect.php';

// Xử lý xóa sản phẩm
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM products WHERE id = $id";
    mysqli_query($conn, $deleteQuery);
    header("Location: admin_products.php");
    exit();
}

// Lấy danh sách sản phẩm
$query = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm - Admin</title>
    <link rel="stylesheet" href="CSS/Giohang.css">
    <link rel="stylesheet" href="../font/css/all.css">
    <style>
        .admin-container {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .admin-header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #7d5ba6;
            color: white;
        }

        a.action-link {
            margin: 0 5px;
            color: #7d5ba6;
            text-decoration: none;
        }

        a.action-link:hover {
            text-decoration: underline;
        }

        .add-product-btn {
            background-color: #7d5ba6;
            color: white;
            padding: 10px 20px;
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-product-btn:hover {
            background-color: #6a4b8c;
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
        <!-- Dùng lại phần header từ Giohang.php -->
        <div class="top-bar">
            <div>
                <a href="admin_home.php"><i class="fa-solid fa-house-user"></i> Trang chủ</a>
                <a href="admin_products.php"><i class="fa-solid fa-gear"></i> Quản lý sản phẩm</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
            </div>
            <div>
                <span style="color: white; margin-right: 10px;"><i class="fa-solid fa-user-shield"></i> Admin</span>
            </div>
        </div>
    </div>

    <div class="admin-container">
        <div class="admin-header">
            <h2>Danh sách sản phẩm</h2>
            <a class="add-product-btn" href="add_product.php"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Tác giả</th>
                    <th>Loại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= number_format($row['price'], 0, ',', '.') ?> đ</td>
                        <td><img src="../Media/<?= htmlspecialchars($row['img']) ?>" width="60"></td>
                        <td><?= htmlspecialchars($row['author']) ?></td>
                        <td><?= htmlspecialchars($row['type']) ?></td>
                        <td>
                            <a class="action-link" href="edit_product.php?id=<?= $row['id'] ?>"><i class="fa fa-edit"></i> Sửa</a>
                            <a class="action-link" href="admin_products.php?delete=<?= $row['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')"><i class="fa fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

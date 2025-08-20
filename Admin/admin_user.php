<?php
session_start();
require_once '../DS/connect.php';

// Xử lý xóa người dùng
if (isset($_GET['delete'])) {
    $email = mysqli_real_escape_string($conn, $_GET['delete']);
    $deleteQuery = "DELETE FROM dn WHERE email = '$email'";
    mysqli_query($conn, $deleteQuery);
    header("Location: admin_users.php");
    exit();
}

// Lấy danh sách người dùng
$query = "SELECT * FROM dn ORDER BY name ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý người dùng - Admin</title>
    <link rel="stylesheet" href="CSS/Giohang.css">
    <link rel="stylesheet" href="../font/css/all.css">
    <style>
        .admin-container {
            padding: 20px;
            max-width: 1000px;
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

        a.action-link {
            color: #7d5ba6;
            text-decoration: none;
        }

        a.action-link:hover {
            text-decoration: underline;
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
                <a href="admin_users.php"><i class="fa-solid fa-user"></i> Quản lý người dùng</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
            </div>
            <div>
                <span><i class="fa-solid fa-user-shield"></i> Admin</span>
            </div>
        </div>
    </div>

    <div class="admin-container">
        <div class="admin-header">
            <h2>Danh sách người dùng</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Mật khẩu (hash)</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['password']) ?></td>
                        <td>
                            <a class="action-link" href="admin_users.php?delete=<?= urlencode($row['email']) ?>" onclick="return confirm('Xóa người dùng này?')"><i class="fa fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

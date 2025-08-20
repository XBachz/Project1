<?php
session_start();
require_once '../Model/cart.php';

$cart = new Cart();
$conn = new mysqli("localhost", "root", "", "qltruyen");
mysqli_set_charset($conn, "utf8");

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$filter_query = $search ? "AND p.name LIKE '%$search%'" : '';

$sql = "SELECT c.session_id, c.product_id, c.quantity, p.name, p.price, p.img, p.author, p.type
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE 1 $filter_query
        ORDER BY c.session_id, c.product_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý giỏ hàng - Admin</title>
    <link rel="stylesheet" href="CSS/Giohang.css">
    <link rel="stylesheet" href="../font/css/all.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; }
        h2 { text-align: center; margin-top: 30px; }
        .search-form { text-align: center; margin: 20px 0; }
        .search-form input[type="text"] { padding: 8px; width: 250px; border-radius: 5px; border: 1px solid #ccc; }
        .search-form button { padding: 8px 12px; background: #5f27cd; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
        table { margin: 20px auto; border-collapse: collapse; width: 95%; background-color: #fff; box-shadow: 0 0 10px #ccc; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #5f27cd; color: white; }
        img { height: 100px; }
        .session-header { background-color: #dcdcdc; font-weight: bold; }
        .delete-btn { color: red; text-decoration: none; font-weight: bold; }
        .admin-header {
            text-align: center;
            margin-bottom: 20px;
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
                <a href="admin_orders.php"><i class="fa-solid fa-file-invoice"></i> Quản lý giỏ hàng</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
            </div>
            <div>
                <span><i class="fa-solid fa-user-shield"></i> Admin</span>
            </div>
        </div>
    </div>

    <h2>Quản lý giỏ hàng người dùng</h2>
    <div class="search-form">
        <form method="GET">
            <input type="text" name="search" placeholder="Tìm theo tên sách..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>

    <?php
    $current_session = null;
    if (mysqli_num_rows($result) > 0):
    ?>
    <table>
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Tác giả</th>
            <th>Thể loại</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <?php if ($current_session !== $row['session_id']): ?>
                <?php
                if ($current_session !== null) echo "<tr><td colspan='8'><hr></td></tr>";
                $current_session = $row['session_id'];
                ?>
                <tr class="session-header">
                    <td colspan="8">Session ID: <?= htmlspecialchars($current_session) ?> | <a class="delete-btn" href="delete_session_cart.php?session_id=<?= $current_session ?>" onclick="return confirm('Xoá toàn bộ giỏ hàng của session này?')">[Xoá tất cả]</a></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td><img src="../Media/<?= htmlspecialchars($row['img']) ?>" alt="<?= htmlspecialchars($row['name']) ?>"></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['author']) ?></td>
                <td><?= htmlspecialchars($row['type']) ?></td>
                <td><?= number_format($row['price'], 0, ',', '.') ?>đ</td>
                <td><?= $row['quantity'] ?></td>
                <td><?= number_format($row['price'] * $row['quantity'], 0, ',', '.') ?>đ</td>
                <td><a class="delete-btn" href="delete_item_cart.php?session_id=<?= $row['session_id'] ?>&product_id=<?= $row['product_id'] ?>" onclick="return confirm('Xoá sản phẩm này?')">Xoá</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
        <p style="text-align: center;">Không có dữ liệu giỏ hàng nào.</p>
    <?php endif; ?>
</body>
</html>

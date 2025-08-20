<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - BookJP.vn</title>
    <link rel="stylesheet" href="CSS/Giohang.css"> <!-- tái sử dụng giao diện người dùng -->
    <link rel="stylesheet" href="../font/css/all.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }
        .admin-title {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .admin-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .admin-card {
            border: 1px solid #ccc;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            background: #fdfdfd;
            transition: 0.3s;
        }
        .admin-card:hover {
            background-color: #f0f0fa;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .admin-card a {
            text-decoration: none;
            font-size: 18px;
            color: #5a3391;
        }
        .admin-card i {
            font-size: 32px;
            margin-bottom: 10px;
            color: #4a2975;
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
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
            </div>
            <div>
                <span><i class="fa-solid fa-user-shield"></i> Admin</span>
            </div>
        </div>
    </div>

    <div class="admin-container">
        <div class="admin-title">Quản lý hệ thống</div>
        <div class="admin-menu">
            <div class="admin-card">
                <i class="fa-solid fa-cart-shopping"></i><br>
                <a href="admin_cart.php">Quản lý giỏ hàng người dùng</a>
            </div>
        
            <div class="admin-card">
                <i class="fa-solid fa-file-invoice"></i><br>
                <a href="admin_order.php">Quản lý đặt hàng</a>
            </div>
            <div class="admin-card">
                <i class="fa-solid fa-user-gear"></i><br>
                <a href="admin_user.php">Thông tin người dùng</a>
            </div>
            <div class="admin-card">
                <i class="fa-solid fa-tag"></i><br>
                <a href="admin_products.php">Quản lý sản phẩm</a>
            </div>
        </div>
    </div>
</body>
</html>

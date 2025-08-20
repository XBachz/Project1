<?php
session_start();
require_once './Model/cart.php';

$cart = new Cart();
$session_id = session_id();
$cart_items = $cart->get_cart_items_session($session_id);

$totalQuantity = 0;
$totalPrice = 0;

if (!empty($cart_items)) {
    foreach ($cart_items as $item) {
        $totalQuantity += (int)$item['quantity'];
        $totalPrice += (int)$item['price'] * (int)$item['quantity'];
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng - BookJP.vn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Giohang.css">
    <link rel="stylesheet" href="font/css/all.css">
</head>
<body>
    <div class="header">
        <div class="top-bar">
            <div>
                <a href="Trangchudex.php"><i class="fa-solid fa-house-user"></i> Trang chủ</a>
                <a href="Trogiup.php"><i class="fa-solid fa-exclamation"></i> Trợ giúp</a>
                <a href="Tintuc.php"><i class="fa-regular fa-newspaper"></i> Tin tức</a>
                <a href="Khuyenmai.php"><i class="fa-solid fa-tags"></i> Khuyến mãi</a>
                <a href="Nhantin.php"><i class="fa-regular fa-envelope"></i> Nhận tin</a>
            </div>
            <div>
                <a href="#"><i class="fa-solid fa-gift"></i> Ưu đãi & tiện ích</a>
                <a href="Kiemtra.php"><i class="fa-solid fa-truck-fast"></i> Kiểm tra đơn hàng</a>
                <?php if (isset($_SESSION['dn'])): ?>
                    <div class="dropdown">
                        <button class="dropbtn">
                            <i class="fa-solid fa-user"></i> Xin chào, <?= htmlspecialchars($_SESSION['dn']) ?> <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="thongtintaikhoan.php"><i class="fa-solid fa-id-card"></i> Thông tin tài khoản</a>
                            <a href="capnhatthongtin.php"><i class="fa-solid fa-pen-to-square"></i> Cập nhật thông tin</a>
                            <a href="doimatkhau.php"><i class="fa-solid fa-key"></i> Đổi mật khẩu</a>
                            <a href="Trangchudex.php"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="dangnhap.php"><i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="logo-search">
            <div class="logo">BookJP.vn</div>
            <div class="search-bar">
                <input placeholder="Bạn cần tìm gì?" type="text"/>
            </div>
            <div class="top-bar1">
                <div class="cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <a href="Giohang.php">Giỏ hàng (<?= $totalQuantity ?>)</a>
                </div>
            </div>
        </div>

        <div class="nav-bar">
            <div class="menu">
                <i class="fas fa-bars"></i> <span>Danh mục sản phẩm</span>
            </div>
            <div class="promo">
                <span>Chương Trình Khuyến Mãi</span>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="cart">
            <h2>Giỏ hàng</h2>
            <?php if (empty($cart_items)): ?>
                <p>Giỏ hàng của bạn đang trống.</p>
            <?php else: ?>
                <?php foreach ($cart_items as $item): ?>
                    <div class="cart-item">
                        <img src="Media/<?= htmlspecialchars($item['img']) ?>" alt="Bìa sách <?= htmlspecialchars($item['name']) ?>" width="100" height="150"/>
                        <div class="cart-item-details">
                            <p><?= htmlspecialchars($item['name']) ?></p>
                            <p>Tác giả: <a href="#"><?= htmlspecialchars($item['author']) ?></a></p>
                            <p>Loại: <?= htmlspecialchars($item['type']) ?></p>
                            <a href="remove_from_cart.php?product_id=<?= $item['product_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</a> |
                            <span style="color: gray;">Thêm vào yêu thích</span>
                        </div>
                        <div class="cart-item-price"><?= number_format($item['price'], 0, ',', '.') ?>đ</div>
                        <div class="cart-item-quantity">
                            <button onclick="updateQuantity('<?= $item['product_id'] ?>', <?= max(1, $item['quantity'] - 1) ?>)">-</button>
                            <input id="qty-<?= $item['product_id'] ?>" type="text" value="<?= $item['quantity'] ?>" readonly style="width:40px; text-align:center;">
                            <button onclick="updateQuantity('<?= $item['product_id'] ?>', <?= $item['quantity'] + 1 ?>)">+</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="summary">
            <p><span id="totalQuantity"><?= $totalQuantity ?></span> sản phẩm</p>
            <p class="total-price"><span id="totalPrice"><?= number_format($totalPrice, 0, ',', '.') ?></span> đ</p>
            <p>(Chưa bao gồm phí vận chuyển)</p>
            <button class="checkout-button">
                <a href="thanhtoan.php" style="color:rgb(82, 32, 120)">Tiến hành đặt hàng</a>
            </button>
        </div>
    </div>

    <script>
        function updateQuantity(productId, newQty) {
            if (newQty < 1) return;
            fetch(`update_cart.php?product_id=${productId}&qty=${newQty}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`qty-${productId}`).value = newQty;
                        document.getElementById('totalQuantity').innerText = data.totalQuantity;
                        document.getElementById('totalPrice').innerText = data.totalPrice.toLocaleString('vi-VN');
                    } else {
                        alert('Cập nhật thất bại!');
                    }
                })
                .catch(() => alert('Lỗi mạng!'));
        }
    </script>
</body>
</html>

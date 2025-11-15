<?php
session_start();
require_once './Model/cart.php';

$cart = new Cart();
$session_id = session_id();
$cart_items = $cart->get_cart_items_session($session_id);

$totalQuantity = 0;
if (!empty($cart_items)) {
    foreach ($cart_items as $item) {
        $totalQuantity += (int)$item['quantity'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Trang1.css">
    <link rel="stylesheet" href="font/css/all.css">
    <base herf="http://127.0.0.1:5500/Trangchu.html">
    <title>
    BookJP.vn
    </title>
</head>
<?php
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
 <body>
  <script>
window.addEventListener("scroll", function() {
    const header = document.querySelector(".header");
    if (window.scrollY > 20) {
        header.classList.add("shrink");
    } else {
        header.classList.remove("shrink");
    }
});
</script>
  <div class="header">
   <div class="top-bar">
    <div>
     <a href="Trangchudex.php">
     <i class="fa-solid fa-house-user"></i>
       Trang chủ
     </a>
     <a href="Trogiup.php">
     <i class="fa-solid fa-exclamation"></i>
      Trợ giúp
     </a>
     <a href="Tintuc.php">
     <i class="fa-regular fa-newspaper"></i>
      Tin tức
     </a>
     <a href="Khuyenmai.php">
     <i class="fa-solid fa-tags"></i>
      Khuyến mãi
     </a>
     <a href="Nhantin.php">
      <i class="fa-regular fa-envelope"></i>
        Nhận tin
      </a>
    </div>
    <div>
     <a href="#">
     <i class="fa-solid fa-gift"></i>
      Ưu đãi &amp; tiện ích 
     </a>
     <a href="Kiemtra.php">
     <i class="fa-solid fa-truck-fast"></i>
      Kiểm tra đơn hàng
     </a>
     <?php if (isset($_SESSION['dn'])): ?>
        <div class="dropdown">
          <button class="dropbtn">
            <i class="fa-solid fa-user"></i> Xin chào, <?= htmlspecialchars($_SESSION['dn']) ?> <i class="fa-solid fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
          <a href="thongtintaikhoan.php"><i class="fa-solid fa-id-card"></i> Thông tin tài khoản</a>
          <a href="capnhatthongtin.php"><i class="fa-solid fa-pen-to-square"></i> Cập nhật thông tin</a>
          <a href="doimatkhau.php"><i class="fa-solid fa-key"></i> Đổi mật khẩu</a>
          <a href="trangchu.php"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
          </div>
        </div>
      <?php else: ?>
        <a href="dangnhap.php"><i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a>
      <?php endif; ?>
    </div>
   </div>
   <div class="logo-search">
    <div class="logo">
     BookJP.vn
    </div>
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
   <div class="dropdown">
          <button class="dropbtn">
            <i class="fas fa-bars"></i> Danh muc san pham
          </button>
          <div class="dropdown-content">
          <a href="#"> Truyen moi </a>
          <a href="#"> Truyen Nhat </a>
          <a href="#"> Light Novel </a>
          <a href="#"> Truyen Trung </a>
          </div>
        </div>
   </div>
   <div class="promo">
    <span>
     Chương Trình Khuyến Mãi
    </span>
   </div>
  </div>
  </div>
  <div class="main-content">
   <div class="sidebar">
    <h3>
     Danh mục
    </h3>
    <ul>
     <li>
      <a href="#">
       Truyện tranh Việt Nam
      </a>
     </li>
     <li>
      <a href="#">
       Truyện tranh Nước Ngoài
      </a>
     </li>
    </ul>
    <h3>
     Theo nhà sản xuất
    </h3>
    <ul>
     <li>
      <a href="#">
       NXB Kim Đồng (9)
      </a>
     </li>
     <li>
      <a href="#">
       Nhà Xuất Bản Trẻ (10)
      </a>
     </li>
     <li>
      <a href="#">
       Thaihabooks (11)
      </a>
     </li>
    </ul>
    <h3>
     Theo giá
    </h3>
    <ul>
     <li>
      <a href="#">
       Giá nhỏ hơn 50.000đ
      </a>
     </li>
     <li>
      <a href="#">
       Giá từ 50.000 - 100.000đ
      </a>
     </li>
     <li>
      <a href="#">
       Giá từ 100.000 - 200.000đ
      </a>
     </li>
     <li>
      <a href="#">
       Giá từ 200.000 - 300.000đ
      </a>
     </li>
     <li>
      <a href="#">
       Giá từ 300.000 - 400.000đ
      </a>
     </li>
     <li>
      <a href="#">
       Giá từ 400.000 - 500.000đ
      </a>
     </li>
     <li>
      <a href="#">
       Giá từ 500.000 - 1.000.000đ
      </a>
     </li>
     <li>
      <a href="#">
       Giá lớn hơn 1.000.000đ
      </a>
     </li>
    </ul>
    <div class="ad">
      <a href="https://www.facebook.com/bach.ha.58511276">
          <img src="Media/Face.png" alt="">
      </a>
  </div>
   </div>
   <div class="content">
    <div class="banner">
      <a href="Truyen1.php">
          <img src="Media/bia1.jpg" alt="Banner 1" class="active" />
      </a>
      <a href="Truyen2.html">
          <img src="Media/bia2.jpg" alt="Banner 2" />
      </a>
      <a href="Truyen2.html">
          <img src="Media/bia3.png" alt="Banner 3" />
      </a>
  </div>
  <script>
    const images = document.querySelectorAll('.banner img');
    let currentIndex = 0;

    function changeImage() {
        images[currentIndex].classList.remove('active'); // Ẩn hình ảnh hiện tại
        currentIndex = (currentIndex + 1) % images.length; // Chuyển đến hình ảnh tiếp theo
        images[currentIndex].classList.add('active'); // Hiển thị hình ảnh tiếp theo
    }

    // Chuyển đổi hình ảnh mỗi 3 giây
    setInterval(changeImage, 4000); // Thay đổi thời gian tại đây (3000 ms )
    </script>
    <div class="new-books">
     <h3>
      Truyện tranh mới
     </h3>
     <div class="header1">
     <div class="top-bar1">
     <div class="book-list">
      <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/slime.jpg" alt="Diệt slime suốt 300 năm - Tập 1">
        
        <div class="hover-info">
            <h3>Diệt slime suốt 300 năm - Tập 1</h3>
            <p><strong>Tác giả:</strong> Kisetsu Morita</p>
            <p><strong>Mô tả:</strong> Đây là truyện Nhật</p>
            <p><strong>Giá:</strong> 43,000đ</p>
            <a href="Truyen1.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen1.php">Diệt slime suốt 300 năm - Tập 1</a>
    </p>
    <p class="price">43,000đ</p>
</div>
       <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/slime2.jpg" alt="Diệt slime suốt 300 năm - Tập 1">
        
        <div class="hover-info">
            <h3>Diệt slime suốt 300 năm - Tập 2</h3>
            <p><strong>Tác giả:</strong> Kisetsu Morita</p>
            <p><strong>Giá:</strong> 43,000đ</p>
            <a href="Truyen2.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen2.php">Diệt slime suốt 300 năm - Tập 2</a>
    </p>
    <p class="price">43,000đ</p>
</div>
       <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/slime4.jpg" alt="Diệt slime suốt 300 năm - Tập 1">
        
        <div class="hover-info">
            <h3>Diệt slime suốt 300 năm - Tập 4</h3>
            <p><strong>Tác giả:</strong> Kisetsu Morita</p>
            <p><strong>Giá:</strong> 43,000đ</p>
            <a href="Truyen3.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen3.php">Diệt slime suốt 300 năm - Tập </a>
    </p>
    <p class="price">43,000đ</p>
</div>
       <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/slime6.jpg" alt="Diệt slime suốt 300 năm - Tập 1">
        
        <div class="hover-info">
            <h3>Diệt slime suốt 300 năm - Tập 6</h3>
            <p><strong>Tác giả:</strong> Kisetsu Morita</p>
            <p><strong>Giá:</strong> 43,000đ</p>
            <a href="Truyen4.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen4.php">Diệt slime suốt 300 năm - Tập 6</a>
    </p>
    <p class="price">43,000đ</p>
</div>
       <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/slime7.jpg" alt="Diệt slime suốt 300 năm - Tập 1">
        
        <div class="hover-info">
            <h3>Diệt slime suốt 300 năm - Tập 7</h3>
            <p><strong>Tác giả:</strong> Kisetsu Morita</p>
            <p><strong>Giá:</strong> 43,000đ</p>
            <a href="Truyen5.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen5.php">Diệt slime suốt 300 năm - Tập 7</a>
    </p>
    <p class="price">43,000đ</p>
</div>
       <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/fly1.jpg" alt="Fly me to the moon - Tập 1">
        
        <div class="hover-info">
            <h3>Fly me to the moon - Tập 1</h3>
            <p><strong>Tác giả:</strong> Hata Kenjiro</p>
            <p><strong>Giá:</strong> 44,000đ</p>
            <a href="Truyen6.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen6.php">Fly me to the moon - Tập 1</a>
    </p>
    <p class="price">43,000đ</p>
</div>
       <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/fly3.jpg" alt="Fly me to the moon - Tập 4">
        
        <div class="hover-info">
            <h3>Fly me to the moon - Tập 4</h3>
            <p><strong>Tác giả:</strong> Hata Kenjiro</p>
            <p><strong>Giá:</strong> 44,000đ</p>
            <a href="Truyen7.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen7.php">Fly me to the moon - Tập 4</a>
    </p>
    <p class="price">43,000đ</p>
</div>
       <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/fly4.jpg" alt="Fly me to the moon - Tập 1">
        
        <div class="hover-info">
            <h3>Fly me to the moon - Tập 5</h3>
            <p><strong>Tác giả:</strong> Hata Kenjiro</p>
            <p><strong>Giá:</strong> 44,000đ</p>
            <a href="Truyen8.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen8.php">Fly me to the moon - Tập 5</a>
    </p>
    <p class="price">43,000đ</p>
</div>
      <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/fly5.jpg" alt="Fly me to the moon - Tập 1">
        
        <div class="hover-info">
            <h3>Fly me to the moon - Tập 6</h3>
            <p><strong>Tác giả:</strong> Hata Kenjiro</p>
            <p><strong>Giá:</strong> 44,000đ</p>
            <a href="Truyen9.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen9.php">Fly me to the moon - Tập 6</a>
    </p>
    <p class="price">43,000đ</p>
</div>
       <div class="book-item">
    <div class="book-image-wrapper">
        <img src="Media/fly6.jpg" alt="Fly me to the moon - Tập 1">
        
        <div class="hover-info">
            <h3>Fly me to the moon - Tập 7</h3>
            <p><strong>Tác giả:</strong> Hata Kenjiro</p>
            <p><strong>Giá:</strong> 44,000đ</p>
            <a href="Truyen10.php" class="btn-detail">Xem chi tiết</a>
        </div>
    </div>

    <p class="title">
        <a href="Truyen10.php">Fly me to the moon - Tập 7</a>
    </p>
    <p class="price">43,000đ</p>
</div>
      </div>
     </div>
    </div>
   </div>
  </div>
</div>
  <div class="container">
    <ul class="pagination">
        <li><a href="Trangchudex.php" class="active">1</a></li>
        <li><a href="Trang2.php">2</a></li>
        <li><a href="Trang3.php">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">...</a></li>
        <li><a href="#">></a></li>
    </ul>
</div>
<center>
<div class="footer">
    <div class="container">
     <div class="column">
      <h3>
       DỊCH VỤ
      </h3>
      <ul>
       <li>
        <a href="#  ">
         Điều khoản sử dụng
        </a>
       </li>
       <li>
        <a href="#">
         Chính sách bảo mật
        </a>
       </li>
       <li>
        <a href="#">
         Liên hệ
        </a>
       </li>
       <li>
        <a href="#">
         Hệ thống nhà sách
        </a>
       </li>
       <li>
        <a href="#">
         Tra cứu đơn hàng
        </a>
       </li>
      </ul>
     </div>
     <div class="column">
      <h3>
       HỖ TRỢ
      </h3>
      <ul>
       <li>
        <a href="#">
         Hướng dẫn đặt hàng
        </a>
       </li>
       <li>
        <a href="#">
         Chính sách đổi trả - hoàn tiền
        </a>
       </li>
       <li>
        <a href="#">
         Phương thức vận chuyển
        </a>
       </li>
       <li>
        <a href="#">
         Phương thức thanh toán
        </a>
       </li>
       <li>
        <a href="#">
         Chính sách hàng mua sỉ
        </a>
       </li>
       <li>
        <a href="#">
         Chính sách hàng cho Thư viện - Trường học
        </a>
       </li>
      </ul>
     </div>
     <div class="column">
      <h3>
       Nhà sách BookJP.vn
      </h3>
      <p>
       Admin: Hà Xuân Bách
      </p>
      <p>
       Địa chỉ: Ngõ Gốc Đề, Minh Khai, Hà Nội
      </p>
      <p>
       Số điện thoại: (+84) 1900571595
      </p>
      <p>
       Email: cskh_online@BookJP.com.vn
      </p>
     </div>
     <div class="column">
      <h3>
       KẾT NỐI MẠNG XÃ HỘI
      </h3>
      <div class="social-icons">
       <a href="https://www.facebook.com/bach.ha.58511276/">
        <i class="fab fa-facebook-f">
        </i>
       </a>
       <a href="https://www.youtube.com/@nxb-kimdong">
        <i class="fab fa-youtube">
        </i>
       </a>
       <a href="https://www.instagram.com/">
        <i class="fab fa-instagram">
        </i>
       </a>
      </div>
     </div>
    </div>
    <div class="container">
     <div class="column copyright">
      <p>
       COPYRIGHTS © 2021 BY BOOKJP.VN. POWERED BY HARAVAN
      </p>
     </div>
    </div>
   </div>
</center>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Trogiup.css">
    <link rel="stylesheet" href="font/css/all.css">
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
       <i class="fa-solid fa-cart-shopping">
       </i>
      <a href="#">
       Giỏ hàng (0)
      </a>
      </div>
     </div>
    </div>
    </div>
      <div class="nav-bar">
     <div class="menu">
      <i class="fas fa-bars">
      </i>
      <span>
       Danh mục sản phẩm
      </span>
     </div>
     <div class="promo">
      <span>
       Chương Trình Khuyến Mãi
      </span>
     </div>
    </div>
  <div class="container">
   <div class="sidebar">
    <button>
     Giới thiệu BookBuy
    </button>
    <button>
     Câu hỏi thường gặp
    </button>
    <button>
     Hướng dẫn mua hàng
    </button>
    <button>
     Phương thức thanh toán
    </button>
    <button>
     Phương thức vận chuyển
    </button>
    <button>
     Đặt hàng theo yêu cầu
    </button>
    <button>
     Liên hệ
    </button>
    <button>
     Phiếu đăng ký đổi/ trả hàng
    </button>
   </div>
   <div class="content">
    <div class="header1">
     HƯỚNG DẪN MUA HÀNG
    </div>
    <div class="banner">
     <img alt="Banner with flying ladybugs and BookBuy logo" height="600" src="Media/HD.jpg" width="800"/>
     <div class="text">
    
     </div>
     <div class="subtext">
      Tin tưởng và Tận hưởng
     </div>
    </div>
    <div class="order-info">
     <h2>
      ĐẶT HÀNG ONLINE
     </h2>
     <p>
      2 PHÚT
      <span>
       NHANH CHÓNG CHO
      </span>
      3 BƯỚC
      <span>
       ĐƠN GIẢN
      </span>
     </p>
     <p>
      Chọn sản phẩm ▸ Nhập thông tin đặt hàng ▸ Đặt mua
     </p>
    </div>
   </div>
  </div>
  <center>
    <div class="footer">
     <div class="footer-column">
      <h3>
       HỖ TRỢ KHÁCH HÀNG
      </h3>
      <p>
       Sản phẩm &amp; Đơn hàng: 0339 724 217
      </p>
      <p>
       Kỹ thuật &amp; Bảo hành: 0339 724 217
      </p>
      <p>
       Điện thoại: (028) 3820 7153 (giờ hành chính)
      </p>
      <p>
       Email: info@bookjp.vn
      </p>
      <p>
       Địa chỉ: Minh khai , Hà Nội
      </p>
      <p>
       Sơ đồ đường đi
      </p>
     </div>
     <div class="footer-column">
      <h3>
       TRỢ GIÚP
      </h3>
      <p>
       Hướng dẫn mua hàng
      </p>
      <p>
       Phương thức thanh toán
      </p>
      <p>
       Phương thức vận chuyển
      </p>
      <p>
       Chính sách đổi - trả
      </p>
      <p>
       Chính sách bồi hoàn
      </p>
      <p>
       Câu hỏi thường gặp (FAQs)
      </p>
     </div>
     <div class="footer-column">
      <h3>
       TÀI KHOẢN CỦA BẠN
      </h3>
      <p>
       Cập nhật tài khoản
      </p>
      <p>
       Giỏ hàng
      </p>
      <p>
       Lịch sử giao dịch
      </p>
      <p>
       Sản phẩm yêu thích
      </p>
      <p>
       Kiểm tra đơn hàng
      </p>
     </div>
     <div class="footer-column">
      <h3>
       BookJP.vn
      </h3>
      <p>
       Giới thiệu BookJP.vn
      </p>
      <p>
        XuanBach trên Facebook
      </p>
      <p>
       Liên hệ BookJP.vn
      </p>
      <p>
       Đặt hàng theo yêu cầu
      </p>
      <p>
       Tích lũy Xu
      </p>
      <p>
       Proguide.vn - Kaspersky
      </p>
      <p>
        BookJP.vn
      </p>
     </div>
    </div>
    <div class="footer-social">
     <p>
      Link mô tả:...    
     </p>
     <img alt="Zalo icon" height="30" src="Media/zalo.jpg" width="30"/>
     <img alt="Facebook icon" height="30" src="Media/icon.jpg" width="30"/>
     <img alt="Instagram icon" height="30" src="Media/Insta.jpg" width="30"/>
     <img alt="Pinterest icon" height="30" src="Media/Pin.png" width="30"/>
     <img alt="YouTube icon" height="30" src="Media/Youtube.png" width="30"/>
     <img alt="TikTok icon" height="30" src="Media/TT.jpg" width="30"/>
    </div>
   </div>
  </center>
 </body>
</html>
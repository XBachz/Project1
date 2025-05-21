<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/khuyenmai.css">
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
    <div class="header1">
     KHUYẾN MÃI HẾT HẠN
    </div>
    <div class="promotion-row">
     <div class="promotion-item">
      <div class="promotion">
       <img alt="Promotion Image 1" height="300" src="Media/XP.jpg" width="600"/>
       <div class="promotion-title">
        XPPEN CƠN LỐC SIÊU SỐC
       </div>
       <div class="promotion-date">
        Từ: 01/10/2024    Đến: 25/10/2024
       </div>
       <div class="promotion-detail">
        Chi tiết chương trình
        <a href="#">
         XEM TẠI ĐÂY
        </a>
       </div>
      </div>
     </div>
     <div class="promotion-item">
      <div class="promotion">
       <img alt="Promotion Image 2" height="300" src="Media/Xp1.jpg" width="600"/>
       <div class="promotion-title">
        ƯU ĐÃI DÀNH CHO GIÁO VIÊN - HỌC SINH-SINH VIÊN
       </div>
       <div class="promotion-date">
        Từ: 27/11/2024      Đến: 31/12/2024
       </div>
       <div class="promotion-detail">
        Chi tiết chương trình
        <a href="#">
         XEM TẠI ĐÂY
        </a>
       </div>
      </div>
     </div>
     <div class="promotion-item">
      <div class="promotion">
       <img alt="Promotion Image 3" height="300" src="Media/Km9.jpg" width="600"/>
       <div class="promotion-title">
        Flashsale 1-0-2
       </div>
       <div class="promotion-date">
        Từ: 23/07/2024    Đến: 23/07/2024
       </div>
       <div class="promotion-detail">
        Chi tiết chương trình
        <a href="#">
         XEM TẠI ĐÂY
        </a>
       </div>
      </div>
     </div>
     <div class="promotion-item">
      <div class="promotion">
       <img alt="Promotion Image 4" height="300" src="Media/Xp3.jpg" width="600"/>
       <div class="promotion-title">
        XP-PEN GIẢM KHỦNG NHẤT NĂM!
       </div>
       <div class="promotion-date">
        Từ: 06/01/2024    Đến: 01/02/2024
       </div>
       <div class="promotion-detail">
        Chi tiết chương trình
        <a href="#">
         XEM TẠI ĐÂY
        </a>
       </div>
      </div>
     </div>
     <div class="promotion-item">
      <div class="promotion">
       <img alt="Promotion Image 3" height="300" src="Media/Km2.jpg" width="600"/>
       <div class="promotion-title">
        Flashsale - Bigsale
       </div>
       <div class="promotion-date">
        Từ: 23/07/2024    Đến: 23/07/2024
       </div>
       <div class="promotion-detail">
        Chi tiết chương trình
        <a href="#">
         XEM TẠI ĐÂY
        </a>
       </div>
      </div>
     </div>
     <div class="promotion-item">
      <div class="promotion">
       <img alt="Promotion Image 3" height="300" src="Media/Km2.jpg" width="600"/>
       <div class="promotion-title">
        Bigsale 1-0-2
       </div>
       <div class="promotion-date">
        Từ: 23/06/2023    Đến: 16/07/2023
       </div>
       <div class="promotion-detail">
        Chi tiết chương trình
        <a href="#">
         XEM TẠI ĐÂY
        </a>
       </div>
      </div>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/nhantin.css">
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
  <div class="footer">
  <div class="container">
  <div class="column license">
       <h3>
        GIẤY PHÉP THÀNH LẬP TRANG WEB
       </h3>
       <p>
        Giấy phép: ngày 6/10/2018 của Bộ Thông tin và Truyền thông
       </p>
       <img alt="Đã thông báo Bộ Công Thương" height="150" src="Media/logo.jpg" width="300"/>
      </div>
      <div class="column newsletter">
       <h3>
        ĐĂNG KÝ NHẬN TIN
       </h3>
       <p>
        Hãy nhập địa chỉ email của bạn vào ô dưới đây để có thể nhận được tất cả các tin tức mới nhất của shop về các sản phẩm mới, các chương trình khuyến mãi mới. BookJP.vn xin đảm bảo sẽ không gửi mail rác, mail spam tới bạn.
       </p>
       <input placeholder="Nhập email của bạn..." type="email"/>
       <button>
        ĐĂNG KÝ
       </button>
      </div>
     </div>
     </div>
    <center>
      <div class="footer">
          <div class="container1">
           <div class="column">
            <h3>
             DỊCH VỤ
            </h3>
            <ul>
             <li>
              <a href="#">
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
         </div>
      </center>
</body>
</html>
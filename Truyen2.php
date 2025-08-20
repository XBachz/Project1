<?php
session_start();
require_once 'Model/cart.php';

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
    <title>Document</title>
    <link rel="stylesheet" href="CSS/truyen1.css">
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
      <a href="Trogiup.html">
      <i class="fa-solid fa-exclamation"></i>
       Trợ giúp
      </a>
      <a href="Tintuc.html">
      <i class="fa-regular fa-newspaper"></i>
       Tin tức
      </a>
      <a href="Khuyenmai.html">
      <i class="fa-solid fa-tags"></i>
       Khuyến mãi
      </a>
      <a href="Nhantin.html">
        <i class="fa-regular fa-envelope"></i>
          Nhận tin
        </a>
     </div>
     <div>
      <a href="#">
      <i class="fa-solid fa-gift"></i>
       Ưu đãi &amp; tiện ích
      </a>
      <a href="Kiemtra.html">
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
        <div class="product-image">
         <img alt="Diệt slime suốt 300 năm - Tập 1" height="430" src="Media/slime2.jpg" width="500"/>
        </div>
        <div class="product-details">
         <div class="product-title">
            Diệt slime suốt 300 năm - Tập 2
         </div>
         <div class="product-author">
            Kisetsu Morita
          <span>
           (Tác giả)
          </span>
         </div>
         <div class="product-translator">
          Hikari
          <span>
           (Dịch giả)
          </span>
         </div>
         <div class="product-price">
          43,000 đ
         </div>
         <div class="product-status">
          Tình trạng: Còn hàng
         </div>
         <div class="product-tags">
          Tags:
          <span>
            Diệt slime suốt 300 năm, Truyện tranh Nước Nhật, Isekai, Yuri, Comedy, Action
          </span>
         </div>
         <div class="quantity">
           Số Lượng:
  <button type="button" id="decrease">-</button>
  <input type="text" id="quantity-input" value="1" readonly style="width: 40px; text-align: center;"/>
  <button type="button" id="increase">+</button>
</div>
<script>
  const input = document.getElementById('quantity-input');
  const increaseBtn = document.getElementById('increase');
  const decreaseBtn = document.getElementById('decrease');

  increaseBtn.addEventListener('click', () => {
    let currentValue = parseInt(input.value);
    input.value = currentValue + 1;
  });

  decreaseBtn.addEventListener('click', () => {
    let currentValue = parseInt(input.value);
    if (currentValue > 1) {
      input.value = currentValue - 1;
    }
  });
  const addToCartButton = document.querySelector('.add-to-cart');
const quantityInput = document.getElementById('quantity-input');
const quantityInputHidden = document.getElementById('quantity-input-hidden');

addToCartButton.addEventListener('click', (event) => {
    quantityInputHidden.value = quantityInput.value;
});
</script>
        <div class="buttons">
    <form action="add_to_cart.php" method="post">
        <input type="hidden" name="product_id" value="1"> <input type="hidden" name="quantity" id="quantity-input-hidden" value="1">
        <button type="submit" class="add-to-cart">
            THÊM VÀO GIỎ HÀNG
        </button>
    </form>
          <button class="buy-now">
           MUA NGAY
          </button>
         </div>
         <div class="contact-info">
          Gọi đặt hàng: (028) 3820 7153 hoặc 0933 109 009
         </div>
         <div class="additional-info">
          <p>
           <strong>
            Thông tin &amp; Khuyến mãi
           </strong>
          </p>
          <p>
           Đổi trả hàng trong vòng 7 ngày
          </p>
          <p>
           Sử dụng mỗi 3.000 Xu để được giảm 10.000đ.
           <a href="#">
            Làm sao để lấy Xu?
           </a>
          </p>
          <p>
           Freeship nội thành Hà Nội từ 150.000đ*. Chi tiết tại
           <a href="#">
            đây
           </a>
          </p>
          <p>
           Freeship toàn quốc từ 250.000đ
          </p>
         </div>
        </div>
        <div class="sidebar">
         <ul>
          <li>
           <i class="far fa-heart">
           </i>
           Thêm vào yêu thích
          </li>
          <li>
           <i class="fas fa-user-friends">
           </i>
           Ưu đãi Khách hàng thân thiết
          </li>
          <li>
           <i class="fas fa-truck">
           </i>
           Để được miễn phí vận chuyển
          </li>
         </ul>
         <div class="share-buttons">
          <button class="facebook">
           <i class="fab fa-facebook-f">
           </i>
           Thích 0
          </button>
          <button class="post">
           <i class="fas fa-times">
           </i>
           Post
          </button>
          <button class="save">
           <i class="fas fa-thumbtack">
           </i>
           Lưu
          </button>
         </div>
        </div>
       </div>
       <div class="container2">
        <div class="title">THÔNG TIN CHI TIẾT</div>
              <table class="info-table">
                  <tr>
                      <td>Nhà xuất bản:</td>
                      <td><a href="https://www.nxbtre.com.vn/">NXB Trẻ</a></td>
                  </tr>
                  <tr>
                      <td>Ngày xuất bản:</td>
                      <td>19/04/2024</td>
                  </tr>
                  <tr>
                      <td>Nhà phát hành:</td>
                      <td><a href="https://www.nxbtre.com.vn/">NXB Trẻ</a></td>
                  </tr>
                  <tr>
                      <td>Kích thước:</td>
                      <td>đóng hàng (RxDxC) 11.3 x 17.6 x 2.0 cm</td>
                  </tr>
                  <tr>
                      <td>Số trang:</td>
                      <td>192 trang</td>
                  </tr>
                  <tr>
                      <td>Trọng lượng:</td>
                      <td>350 gram</td>
                  </tr>
              </table>
              <div class="section-title">Giới thiệu sản phẩm</div>
          </div>
        <div class="container1">
        <div class="header1">
               NHẬN XÉT CỦA KHÁCH HÀNG
            </div>
            <div class="no-reviews">
               Chưa có đánh giá
            </div>
            <button class="review-button">
               Viết đánh giá
              </button>
              <div class="comments-section">
               <div class="comments-header">
                0 bình luận
               </div>
               <textarea class="comment-box" placeholder="Bình luận..."></textarea>
               <div class="sort-by">
                Sắp xếp theo
                <select>
                 <option>
                  Cũ nhất
                 </option>
                 <option>
                  Mới nhất
                 </option>
                </select>
               </div>
              </div>
              <div class="newsletter">
               <img alt="KoKo" height="100" src="Media/koko.jpg" width="100"/>
               <div>
                <div class="newsletter-text">
                 Đăng ký nhận bản tin
                </div>
                <div class="newsletter-inputs">
                 <input placeholder="Nhập tên của bạn" type="text"/>
                 <input placeholder="Nhập địa chỉ email của bạn" type="text"/>
                 <button>
                  NAM
                 </button>
                 <button>
                  NỮ
                 </button>
                 <button>
                  Khác
                 </button>
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
                Link mô tả:
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
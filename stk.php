<?php
session_start();
if (!isset($_SESSION['address'])) {
    header("Location: thanhtoan.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8" />
<title>Thanh toán</title>
<style>
    /* Style cơ bản cho trang */
    body {font-family: Arial, sans-serif; background:#f5f5f5; margin:0; padding:0;}
    .container {max-width: 600px; margin: 30px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px #ccc;}
    h2 {color: #ff6600;}
    label {display: block; margin-top: 10px; font-weight: bold;}
    input[type="radio"], input[type="checkbox"] {margin-right: 10px;}
    textarea, select {width: 100%; padding: 8px; margin-top: 5px;}
    button {margin-top: 20px; background: #ff6600; color: #fff; border:none; padding: 10px; cursor: pointer; border-radius: 4px;}
</style>
</head>
<body>
<div class="container">
    <h2>Thông tin thanh toán & vận chuyển</h2>
    <form method="POST" action="checkout.php">
        <label>Phương thức vận chuyển:</label>
        <label><input type="radio" name="shipping" value="Chuyển thường" required checked> Chuyển thường</label>
        <label><input type="radio" name="shipping" value="Chuyển nhanh"> Chuyển nhanh</label>

        <label>Phương thức thanh toán:</label>
        <label><input type="radio" name="payment" value="Thẻ ATM đăng ký Internet Banking" required checked> Thẻ ATM đăng ký Internet Banking (miễn phí)</label>
        <label><input type="radio" name="payment" value="Ví điện tử"> Ví điện tử</label>
        <label><input type="radio" name="payment" value="Chuyển khoản ngân hàng"> Chuyển khoản ngân hàng</label>
        <label><input type="radio" name="payment" value="Thanh toán tiền mặt khi nhận hàng (COD)"> Thanh toán tiền mặt khi nhận hàng (COD)</label>

        <label for="note">Ghi chú (không bắt buộc):</label>
        <textarea id="note" name="note" rows="4" placeholder="Ghi chú thêm cho đơn hàng..."><?php echo $_SESSION['note'] ?? ''; ?></textarea>

        <button type="submit">Hoàn tất đặt hàng</button>
    </form>
</div>
</body>
</html>

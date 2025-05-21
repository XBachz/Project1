<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="CSS/dangky.css">
    <link rel="stylesheet" href="font/css/all.css">
</head>
<body>
<main>
    <div class="container">
        <h2>Đăng ký</h2>
        <form action="process/process_dangky.php" method="POST">
            <a href="https://www.facebook.com/r.php?locale=vi_VN&display=page" class="facebook-btn">
                <i class="fa-brands fa-facebook"></i> Đăng ký bằng tài khoản Facebook
            </a>

            <div class="divider"><span>hoặc đăng ký dùng email</span></div>

            <div class="form-group">
                <input type="text" name="txtname" id="txtname" placeholder="Họ tên" required>
            </div>
            <div class="form-group">
                <input type="email" name="txtmail" id="txtmail" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="txtpass" id="txtpass" placeholder="Mật khẩu" required>
            </div>
            <div class="form-group">
                <input type="password" name="txtconfirm" id="txtconfirm" placeholder="Nhập lại mật khẩu" required>
            </div>
            <button type="submit" class="submit-btn">Đăng ký</button>
        </form>

        <div class="login-link">
            Đã có tài khoản? <a href="dangnhap.php">Đăng nhập tại đây</a>
        </div>
    </div>
</main>
</body>
</html>

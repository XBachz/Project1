<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="CSS/dangnhap.css">
    <link rel="stylesheet" href="font/css/all.css">
</head>
<body>
<main>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form action="process/process_dangnhap.php" method="POST">
            <a href="https://www.facebook.com/login" class="facebook-login">
                <i class="fa-brands fa-facebook"></i> Đăng nhập bằng tài khoản Facebook
            </a>
            <div class="separator"><span>hoặc đăng nhập dùng email</span></div>

            <input type="email" name="txtmail" id="email" placeholder="Email" required>

            <div class="password-container">
                <input type="password" name="txtpass" id="password" placeholder="Mật khẩu" required>
                <a href="#" class="Quên mật khẩu">
                    <i class="fa-solid fa-circle-question" title="Quên mật khẩu? Click vào đây để reset mật khẩu"></i>
                </a>
            </div>

            <button type="submit" class="login-button">Đăng nhập</button>
        </form>

        <div class="register-link">
            Chưa có tài khoản? <a href="Dangky.php">Đăng ký tại đây</a>
        </div>
    </div>
</main>
</body>
</html>

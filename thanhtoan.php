<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Địa chỉ giao hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .header .step {
            display: flex;
            align-items: center;
        }
        .header .step span {
            margin-right: 10px;
            font-size: 18px;
            color: #ff6600;
        }
        .header .step span:last-child {
            color: #999;
        }
        h2 {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #ff6600;
            outline: none;
        }
        .form-group .required {
            color: red;
        }
        .form-group .radio-group {
            display: flex;
            align-items: center;
        }
        .form-group .radio-group label {
            margin-right: 20px;
        }
        .form-group .radio-group input {
            margin-right: 5px;
        }
        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #ff6600;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #e65c00;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="header">
        <strong><a href="Trangchudex.php" style="text-decoration:none; color: inherit;">BookJP.vn</a></strong>
            <div class="step">
                <span>1</span>
                <span>Điền thông tin</span>
                <span>---------> </span>
                <span>2 Thanh toán & Hoàn tất</span>
            </div>
        </div>
        <h2>ĐỊA CHỈ GIAO HÀNG</h2>
        <form method="POST" action="diachi.php">
            <div class="form-group">
                <label for="name">Họ tên <span class="required">*</span></label>
                <input type="text" id="name" name="name" required value="<?php echo $_SESSION['address']['name'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email nhận đơn hàng <span class="required">*</span></label>
                <input type="email" id="email" name="email" required value="<?php echo $_SESSION['address']['email'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="country">Quốc gia <span class="required">*</span></label>
                <select id="country" name="country" required>
                    <option value="Việt Nam" <?php if (($_SESSION['address']['country'] ?? '') === 'Việt Nam') echo 'selected'; ?>>Việt Nam</option>
                    <option value="Khác" <?php if (($_SESSION['address']['country'] ?? '') === 'Khác') echo 'selected'; ?>>Khác</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">Tỉnh / Thành Phố <span class="required">*</span></label>
                <input type="text" id="city" name="city" required value="<?php echo $_SESSION['address']['city'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="district">Quận / Huyện <span class="required">*</span></label>
                <input type="text" id="district" name="district" required value="<?php echo $_SESSION['address']['district'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="address">Số nhà & tên đường <span class="required">*</span></label>
                <textarea id="address" name="address" rows="3" required><?php echo $_SESSION['address']['address'] ?? ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Di động <span class="required">*</span></label>
                <input type="tel" id="phone" name="phone" required value="<?php echo $_SESSION['address']['phone'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label>Đây là:</label>
                <div class="radio-group">
                    <label><input type="radio" name="address_type" value="Nhà riêng" required <?php if (($_SESSION['address']['address_type'] ?? '') === 'Nhà riêng') echo 'checked'; ?>> Nhà riêng</label>
                    <label><input type="radio" name="address_type" value="Nơi làm việc" required <?php if (($_SESSION['address']['address_type'] ?? '') === 'Nơi làm việc') echo 'checked'; ?>> Nơi làm việc</label>
                </div>
            </div>
            <button type="submit" class="submit-btn">Giao đến địa chỉ này</button>
        </form>
    </div>
</body>
</html>
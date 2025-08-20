<?php
require_once '../DS/connect.php';

$id = intval($_GET['id'] ?? 0);
$product = null;

// Lấy dữ liệu sản phẩm hiện tại
if ($id > 0) {
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($result);
}

if (!$product) {
    echo "Sản phẩm không tồn tại.";
    exit();
}

// Cập nhật sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = intval($_POST['price'] ?? 0);
    $img = $_POST['img'] ?? '';
    $type = $_POST['type'] ?? '';
    $author = $_POST['author'] ?? '';

    $query = "UPDATE products SET name=?, price=?, img=?, type=?, author=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sisssi', $name, $price, $img, $type, $author, $id);
    mysqli_stmt_execute($stmt);

    header("Location: admin_products.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="CSS/Giohang.css">
    <link rel="stylesheet" href="font/css/all.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #fdfdfd;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #7d5ba6;
            color: white;
            border: none;
            border-radius: 6px;
        }

        button:hover {
            background-color: #6a4b8c;
        }

        .back-link {
            text-align: center;
            margin-top: 15px;
        }

        .back-link a {
            color: #7d5ba6;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Chỉnh sửa sản phẩm</h2>
        <form method="POST">
            <label>Tên sản phẩm:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>

            <label>Giá:</label>
            <input type="number" name="price" value="<?= $product['price'] ?>" required>

            <label>Ảnh (tên file):</label>
            <input type="text" name="img" value="<?= htmlspecialchars($product['img']) ?>" required>

            <label>Loại sản phẩm:</label>
            <input type="text" name="type" value="<?= htmlspecialchars($product['type']) ?>" required>

            <label>Tác giả:</label>
            <input type="text" name="author" value="<?= htmlspecialchars($product['author']) ?>" required>

            <button type="submit">Cập nhật</button>
        </form>
        <div class="back-link">
            <a href="admin_products.php"><i class="fa fa-arrow-left"></i> Quay lại danh sách</a>
        </div>
    </div>
</body>
</html>

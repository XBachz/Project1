<?php
// (1) Mảng sách và xử lý tìm kiếm
$books = [...]; // <-- đoạn mã bạn gửi
$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';
$filteredBooks = $keyword !== '' ? array_filter($books, function ($book) use ($keyword) {
    return stripos($book['title'], $keyword) !== false;
}) : $books;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thư viện sách</title>
  <style>
    .book-list { display: flex; flex-wrap: wrap; gap: 20px; }
    .book-item { width: 150px; text-align: center; }
    .price { color: red; }
  </style>
</head>
<body>

<!-- (2) Form tìm kiếm -->
<form method="GET" action="">
  <input type="text" name="q" placeholder="Tìm kiếm sách..." value="<?= htmlspecialchars($keyword) ?>">
  <button type="submit">Tìm</button>
</form>

<!-- (3) Kết quả tìm kiếm -->
<h2>Kết quả <?= $keyword ? 'cho từ khóa: ' . htmlspecialchars($keyword) : 'toàn bộ sách' ?></h2>
<div class="book-list">
<?php if (empty($filteredBooks)): ?>
    <p>Không tìm thấy kết quả phù hợp.</p>
<?php else: ?>
    <?php foreach ($filteredBooks as $book): ?>
        <div class="book-item">
            <img src="<?= htmlspecialchars($book['img']) ?>" width="150" height="200" alt="<?= htmlspecialchars($book['title']) ?>">
            <p><a href="<?= htmlspecialchars($book['link']) ?>"><?= htmlspecialchars($book['title']) ?></a></p>
            <p class="price"><?= number_format($book['price'], 0, ',', '.') ?>đ</p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>

</body>
</html>

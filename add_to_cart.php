<?php
session_start();
require_once './Model/cart.php';

$cart = new Cart();
$session_id = session_id();

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = max(1, intval($_POST['quantity']));

    $success = $cart->add_to_cart_session($session_id, $product_id, $quantity);

    if ($success) {
        header("Location: Giohang.php");
        exit();
    } else {
        echo "Sản phẩm không tồn tại hoặc không thể thêm vào giỏ hàng.";
    }
} else {
    echo "Thiếu thông tin sản phẩm hoặc số lượng.";
}

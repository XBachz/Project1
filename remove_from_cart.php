<?php
session_start();
require_once './Model/cart.php';

$cart = new Cart();
$session_id = session_id();

if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    $removed = $cart->remove_from_cart_session($session_id, $product_id);

    if ($removed) {
        header("Location: Giohang.php");
        exit();
    } else {
        echo "Sản phẩm không tồn tại trong giỏ hàng.";
    }
} else {
    echo "Thiếu thông tin sản phẩm.";
}
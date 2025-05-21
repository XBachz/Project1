<?php
session_start();
include("Model/cart.php");

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $session_id = session_id();

    $cart = new Cart();
    $success = $cart->remove_from_cart_session($session_id, $product_id);

    if ($success) {
        header("Location: Giohang.php");
        exit();
    } else {
        echo "Xóa sản phẩm thất bại!";
    }
} else {
    echo "Thiếu dữ liệu!";
}
?>

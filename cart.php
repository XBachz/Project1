<?php
include("Model/cart.php");

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);
    $session_id = session_id();

    $cart_model = new Cart();

    // Lấy thông tin sản phẩm từ model (nếu bạn lưu trữ ít thông tin trong session)
    $product_data = $cart_model->getProductDetails($product_id);

    if ($product_data) {
        // Sử dụng session để lưu trữ giỏ hàng
        $cart_model->add_to_cart_session($session_id, $product_id, $quantity, $product_data);
        header("Location: Giohang.php");
        exit();
    } else {
        echo "Không tìm thấy thông tin sản phẩm!";
    }
} else {
    //echo "Thiếu dữ liệu!";
}
?>
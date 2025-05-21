<?php
session_start();
include("Model/cart.php");

if (isset($_GET['product_id']) && isset($_GET['qty'])) {
    $product_id = $_GET['product_id'];
    $quantity = intval($_GET['qty']);
    $session_id = session_id();

    $cart = new Cart();
    $success = $cart->update_cart_item_session($session_id, $product_id, $quantity);

    if ($success) {
        $totalQuantity = $cart->get_total_quantity_session($session_id);
        $totalPrice = $cart->get_total_price_session($session_id);
        echo json_encode([
            'success' => true,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>

<?php
session_start();
header('Content-Type: application/json');
require_once './Model/cart.php';

$cart = new Cart();
$session_id = session_id();

if (isset($_POST['product_id']) && isset($_POST['qty'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = max(1, intval($_POST['qty']));

    $updated = $cart->update_cart_item_session($session_id, $product_id, $quantity);

    if ($updated) {
        $totalQuantity = $cart->get_total_quantity_session($session_id);
        $totalPrice = $cart->get_total_price_session($session_id);
        echo json_encode([
            'success' => true,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}

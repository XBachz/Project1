<?php
require_once 'Model/cart.php';
$cart = new Cart();

if (isset($_GET['session_id']) && isset($_GET['product_id'])) {
    $session_id = $_GET['session_id'];
    $product_id = intval($_GET['product_id']);
    $cart->remove_from_cart_session($session_id, $product_id);
}
header("Location: admin_cart.php");
exit();

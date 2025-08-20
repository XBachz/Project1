<?php
class Cart {
    private $conn;

    public function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "qltruyen";

        $this->conn = mysqli_connect($server, $user, $pass, $database);
        if (!$this->conn) {
            die("Kết nối database thất bại: " . mysqli_connect_error());
        }
        mysqli_set_charset($this->conn, "utf8");
    }

    // Lấy thông tin sản phẩm từ database theo product_id
    public function getProductDetails($product_id) {
        $product_id = intval($product_id);
        $sql = "SELECT id, name, price, img, author, type FROM products WHERE id = $product_id LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }

    // Thêm sản phẩm vào giỏ hàng session
    public function add_to_cart_session($session_id, $product_id, $quantity) {
        $product_data = $this->getProductDetails($product_id);
        if (!$product_data) return false;

        if (!isset($_SESSION['cart'][$session_id])) {
            $_SESSION['cart'][$session_id] = [];
        }

        if (isset($_SESSION['cart'][$session_id][$product_id])) {
            $_SESSION['cart'][$session_id][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$session_id][$product_id] = [
                'product_id' => $product_id,
                'name' => $product_data['name'],
                'price' => $product_data['price'],
                'img' => $product_data['img'],
                'author' => $product_data['author'],
                'type' => $product_data['type'],
                'quantity' => $quantity
            ];
        }
        return true;
    }

    // Các hàm còn lại xử lý session cart giống như trên:
    public function get_cart_items_session($session_id) {
        return $_SESSION['cart'][$session_id] ?? [];
    }

    public function update_cart_item_session($session_id, $product_id, $quantity) {
        if (isset($_SESSION['cart'][$session_id][$product_id])) {
            $_SESSION['cart'][$session_id][$product_id]['quantity'] = max(1, intval($quantity));
            return true;
        }
        return false;
    }

    public function remove_from_cart_session($session_id, $product_id) {
        if (isset($_SESSION['cart'][$session_id][$product_id])) {
            unset($_SESSION['cart'][$session_id][$product_id]);
            return true;
        }
        return false;
    }

    public function get_total_quantity_session($session_id) {
        $total = 0;
        if (isset($_SESSION['cart'][$session_id])) {
            foreach ($_SESSION['cart'][$session_id] as $item) {
                $total += $item['quantity'];
            }
        }
        return $total;
    }

    public function get_total_price_session($session_id) {
        $total = 0;
        if (isset($_SESSION['cart'][$session_id])) {
            foreach ($_SESSION['cart'][$session_id] as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
}
?>

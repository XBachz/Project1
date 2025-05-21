<?php

class Cart {
    private $conn; // Biến kết nối database (nếu bạn dùng database)

    public function __construct() {
        // Khởi tạo kết nối database (nếu cần)
        $this->conn = $this->connectDB();
    }

    private function connectDB() {
        // Thông tin kết nối database của bạn
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "qltruyen";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng của session hay chưa (nếu dùng session)
    private function isProductInSessionCart($session_id, $product_id) {
        return isset($_SESSION['cart'][$session_id][$product_id]);
    }

    // Thêm sản phẩm vào giỏ hàng (ví dụ: lưu trong session)
    public function add_to_cart_session($session_id, $product_id, $quantity, $product_data) {
        if (!isset($_SESSION['cart'][$session_id])) {
            $_SESSION['cart'][$session_id] = [];
        }

        if ($this->isProductInSessionCart($session_id, $product_id)) {
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
    }

    // Lấy thông tin sản phẩm từ database (ví dụ)
    public function getProductDetails($product_id) {
        if ($this->conn) {
            $stmt = $this->conn->prepare("SELECT id, name, price, img, author, type FROM products WHERE id = :id");
            $stmt->bindParam(':id', $product_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    // Thêm sản phẩm vào giỏ hàng (ví dụ: lưu trong database)
    public function add_to_cart_db($session_id, $product_id, $quantity) {
        if ($this->conn) {
            // Kiểm tra xem sản phẩm đã có trong giỏ hàng của người dùng chưa
            $stmt = $this->conn->prepare("SELECT quantity FROM cart WHERE session_id = :session_id AND product_id = :product_id");
            $stmt->bindParam(':session_id', $session_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                // Nếu đã có, cập nhật số lượng
                $newQuantity = $row['quantity'] + $quantity;
                $stmt = $this->conn->prepare("UPDATE cart SET quantity = :quantity WHERE session_id = :session_id AND product_id = :product_id");
                $stmt->bindParam(':quantity', $newQuantity);
                $stmt->bindParam(':session_id', $session_id);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
            } else {
                // Nếu chưa có, thêm mới
                $stmt = $this->conn->prepare("INSERT INTO cart (session_id, product_id, quantity) VALUES (:session_id, :product_id, :quantity)");
                $stmt->bindParam(':session_id', $session_id);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->bindParam(':quantity', $quantity);
                $stmt->execute();
            }
        }
    }

    // Lấy các sản phẩm trong giỏ hàng của session (ví dụ: từ session)
    public function get_cart_items_session($session_id) {
        return $_SESSION['cart'][$session_id] ?? [];
    }

    // Lấy các sản phẩm trong giỏ hàng của session (ví dụ: từ database)
    public function get_cart_items_db($session_id) {
        if ($this->conn) {
            $stmt = $this->conn->prepare("SELECT c.product_id, c.quantity, p.name, p.price, p.img, p.author, p.type
                                       FROM cart c
                                       INNER JOIN products p ON c.product_id = p.id
                                       WHERE c.session_id = :session_id");
            $stmt->bindParam(':session_id', $session_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng (ví dụ: session)
    public function update_cart_item_session($session_id, $product_id, $quantity) {
        if (isset($_SESSION['cart'][$session_id][$product_id])) {
            $_SESSION['cart'][$session_id][$product_id]['quantity'] = max(1, intval($quantity));
            return true;
        }
        return false;
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng (ví dụ: database)
    public function update_cart_item_db($session_id, $product_id, $quantity) {
        if ($this->conn) {
            $stmt = $this->conn->prepare("UPDATE cart SET quantity = :quantity WHERE session_id = :session_id AND product_id = :product_id");
            $stmt->bindParam(':quantity', max(1, intval($quantity)));
            $stmt->bindParam(':session_id', $session_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            return true;
        }
        return false;
    }

    // Xóa sản phẩm khỏi giỏ hàng (ví dụ: session)
    public function remove_from_cart_session($session_id, $product_id) {
        if (isset($_SESSION['cart'][$session_id][$product_id])) {
            unset($_SESSION['cart'][$session_id][$product_id]);
            return true;
        }
        return false;
    }

    // Xóa sản phẩm khỏi giỏ hàng (ví dụ: database)
    public function remove_from_cart_db($session_id, $product_id) {
        if ($this->conn) {
            $stmt = $this->conn->prepare("DELETE FROM cart WHERE session_id = :session_id AND product_id = :product_id");
            $stmt->bindParam(':session_id', $session_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            return true;
        }
        return false;
    }

    // Lấy tổng số lượng sản phẩm trong giỏ hàng (ví dụ: session)
    public function get_total_quantity_session($session_id) {
        $total = 0;
        if (isset($_SESSION['cart'][$session_id])) {
            foreach ($_SESSION['cart'][$session_id] as $item) {
                $total += $item['quantity'];
            }
        }
        return $total;
    }

    // Lấy tổng giá trị giỏ hàng (ví dụ: session)
    public function get_total_price_session($session_id) {
        $total = 0;
        if (isset($_SESSION['cart'][$session_id])) {
            foreach ($_SESSION['cart'][$session_id] as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }

    // Lấy tổng số lượng sản phẩm trong giỏ hàng (ví dụ: database)
    public function get_total_quantity_db($session_id) {
        if ($this->conn) {
            $stmt = $this->conn->prepare("SELECT SUM(quantity) AS total_quantity FROM cart WHERE session_id = :session_id");
            $stmt->bindParam(':session_id', $session_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total_quantity'] ?? 0;
        }
        return 0;
    }

    // Lấy tổng giá trị giỏ hàng (ví dụ: database)
    public function get_total_price_db($session_id) {
        if ($this->conn) {
            $stmt = $this->conn->prepare("SELECT SUM(c.quantity * p.price) AS total_price
                                       FROM cart c
                                       INNER JOIN products p ON c.product_id = p.id
                                       WHERE c.session_id = :session_id");
            $stmt->bindParam(':session_id', $session_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total_price'] ?? 0;
        }
        return 0;
    }
}

?>
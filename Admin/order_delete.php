<?php
// Bắt đầu session nếu cần thiết cho thông báo hoặc kiểm tra quyền admin
session_start(); 

require_once '../DS/connect.php';

if (!isset($_GET['id'])) {
    die("Không có ID để xóa");
}

$id = intval($_GET['id']);

// Bắt đầu Transaction
mysqli_begin_transaction($conn);

try {

    // 2. Xóa đơn hàng chính trong bảng orders
    $query_order = "DELETE FROM orders WHERE id = $id";
    if (!mysqli_query($conn, $query_order)) {
        throw new Exception("Lỗi khi xóa đơn hàng chính: " . mysqli_error($conn));
    }

    // Nếu mọi thứ thành công, xác nhận transaction
    mysqli_commit($conn);
    
    // Chuyển hướng thành công
    header("Location: admin_order.php");
    exit();

} catch (Exception $e) {
    // Nếu có lỗi, rollback (hủy bỏ) transaction
    mysqli_rollback($conn);
    
    // Hiển thị lỗi ra màn hình
    echo "Lỗi xóa đơn hàng: " . $e->getMessage();
    // Hoặc chuyển hướng kèm theo thông báo lỗi
    // header("Location: admin_orders.php?msg=error&detail=" . urlencode($e->getMessage()));
    // exit();
}

// Đóng kết nối (tùy chọn)
mysqli_close($conn); 
?>
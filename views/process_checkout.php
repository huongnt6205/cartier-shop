<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu form
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $note = trim($_POST['note'] ?? '');

    // Kiểm tra dữ liệu cơ bản
    if (empty($name) || empty($phone) || empty($address)) {
        // Nếu thiếu dữ liệu, quay lại trang checkout với thông báo lỗi (ví dụ)
        $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin bắt buộc.';
        header('Location: checkout.php');
        exit();
    }

    if (empty($_SESSION['cart'])) {
        $_SESSION['error'] = 'Giỏ hàng trống, không thể thanh toán.';
        header('Location: checkout.php');
        exit();
    }

    // Ở đây, bạn có thể lưu đơn hàng vào DB
    // VD: kết nối DB, chèn dữ liệu đơn hàng, chi tiết đơn hàng,...

    // Ví dụ giả định lưu thành công
    // Xoá giỏ hàng sau khi đặt hàng
    unset($_SESSION['cart']);

    // Chuyển hướng sang trang cảm ơn hoặc đơn hàng thành công
    header('Location: thank_you.php');
    exit();
} else {
    // Nếu không phải POST thì chuyển về trang checkout
    header('Location: checkout.php');
    exit();
}

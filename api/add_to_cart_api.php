<?php
session_start();
require_once __DIR__ . '/../service/cart_service.php';

$post = $_POST;

if (!isset($post['product_id'])) {
    http_response_code(400);
    echo 'Không tìm thấy sản phẩm';
} else {
    if (isset($post['quantity'])) {
        addToCart($post['product_id'], intval($post['quantity']));
    } else {
        addToCart($post['product_id'], 1);
    }

    echo json_encode($_SESSION['cart']);
}

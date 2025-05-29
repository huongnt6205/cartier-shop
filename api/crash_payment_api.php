<?php

require_once __DIR__ . "/../service/order_service.php";

session_start();

if (!isset($_SESSION['cart'])) {
    http_response_code(400);
    echo 'Không có sản phẩm nào trong giỏ hàng';
    return;
}

$customerName = $_POST['customer_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$note = $_POST['note'];
$items = [];

$cart = $_SESSION['cart'];
foreach ($cart as $itemId => $quantity) {
    $items[] = [
        'product_id' => $itemId,
        'quantity' => $quantity
    ];
}

$order = [
    'customer_name' => $customerName,
    'phone' => $phone,
    'address' => $address,
    'note' => $note,
    'items' => $items
];

$ordered = order($order);

if (!$ordered) {
    http_response_code(400);
    header('Location:/cartier-shop/views/checkout_fail.php');
    exit();
} else {
    header('Location:/cartier-shop/views/checkout_success.php');
    exit();
}

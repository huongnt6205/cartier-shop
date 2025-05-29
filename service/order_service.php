<?php

require_once __DIR__ . "/../config/base_query.php";

const ORDER_TABLE = '`order`';
const ORDER_DETAIL_TABLE = '`order_detail`';

const ORDER_PENDING = 'pending';
const ORDER_RECEIVED = 'received';
const ORDER_ORDERED = 'ordered';
const ORDER_CANCEL = 'cancel';

function getOrderDetailByOrderId($orderId)
{
    return findBy(ORDER_DETAIL_TABLE, ['order_id' => $orderId]);
}

function getAllOrder()
{
    $orders = findAll(ORDER_TABLE);
    foreach ($orders as &$order) {
        $items = getOrderDetailByOrderId($order['id']);
        $order['items'] = $items;
    }
    return $orders;
}

function order($order)
{
    $orderId = time();
    $query = "INSERT INTO `order`(id, customer_name, phone, address, note, date, status) VALUES ( ";
    $query .= $orderId;
    $query .= ",";
    $query .= "'" . $order['customer_name'] . "'";
    $query .= ",";
    $query .= "'" . $order['phone'] . "'";
    $query .= ",";
    $query .= "'" . $order['address'] . "'";
    $query .= ",";
    $query .= "'" . $order['note'] . "'";
    $query .= ",";
    $query .= "'" . (new DateTimeImmutable())->format('Y-m-d H:i:s') . "'";
    $query .= ",";
    $query .= "'" . ORDER_ORDERED . "'";
    $query .= ")";

    $orderSaved = execute($query);

    if ($orderSaved <= 0) {
        return false;
    }

    foreach ($order['items'] as $orderItem) {
        $query = "INSERT INTO `order_detail`(order_id, product_id, quantity) VALUES ( ";
        $query .= $orderId;
        $query .= ",";
        $query .= $orderItem['product_id'];
        $query .= ",";
        $query .= $orderItem['quantity'];
        $query .= ")";

        $orderDetailSaved = execute($query);

        if ($orderDetailSaved <= 0) {
            return false;
        }
    }

    $_SESSION['cart'] = null;

    return true;
}
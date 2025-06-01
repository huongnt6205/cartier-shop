<!-- trang danh sách đặt hàng -->

<?php

require_once __DIR__ . '/../service/order_service.php';

// Lấy danh sách đơn hàng từ DB (giả sử có hàm này trong order_service.php)
$orders = getAllOrder();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css" />
    <link rel="stylesheet" href="../admin/css/ad_orders.css" />
    <link rel="stylesheet" href="../admin/css/ad_footer.css" />
    <link rel="stylesheet" href="../admin/css/ad_header.css" />
</head>

<body>
    <?php include 'ad_header.php'; ?>
    <section class="orders-section">
        <h1>Danh sách đơn hàng</h1>

        <?php if (empty($orders)): ?>
            <p>Chưa có đơn hàng nào.</p>
        <?php else: ?>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td data-label="Mã đơn hàng"><?= htmlspecialchars($order['order_id']) ?></td>
                            <td data-label="Khách hàng"><?= htmlspecialchars($order['customer_name']) ?></td>
                            <td data-label="Ngày đặt"><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                            <td data-label="Tổng tiền"><?= number_format($order['total_amount'], 0, ',', '.') ?> VND</td>
                            <td data-label="Trạng thái">
                                <?php
                                switch ($order['status']) {
                                    case ORDER_PENDING:
                                        echo '<span class="status pending">Chờ xử lý</span>';
                                        break;
                                    case ORDER_ORDERED:
                                        echo '<span class="status ordered">Đã đặt hàng</span>';
                                        break;
                                    case ORDER_RECEIVED:
                                        echo '<span class="status received">Đã nhận</span>';
                                        break;
                                    case ORDER_CANCEL:
                                        echo '<span class="status cancelled">Đã hủy</span>';
                                        break;
                                    default:
                                        echo '<span class="status unknown">Không xác định</span>';
                                }
                                ?>
                            </td>
                            <td data-label="Thao tác">
                                <a href="ad_order_detail.php?order_id=<?= urlencode($order['order_id']) ?>" class="btn-detail">Xem chi tiết</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        <?php endif; ?>
    </section>

    <?php include 'ad_footer.php'; ?>
</body>

</html>
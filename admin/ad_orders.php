<?php

require_once __DIR__ . '/../service/order_service.php';

// Lấy danh sách đơn hàng từ DB (giả sử có hàm này trong order_service.php)
$orders = getAllOrder();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="../admin/css/ad_orders.css" />
    <link rel="stylesheet" href="../admin/css/ad_footer.css" />
</head>

<body>
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
                            <td><?= htmlspecialchars($order['order_id']) ?></td>
                            <td><?= htmlspecialchars($order['customer_name']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                            <td><?= number_format($order['total_amount'], 0, ',', '.') ?> VND</td>
                            <td>
                                <?php
                                // Ví dụ trạng thái có thể là: 0=Chờ xử lý, 1=Đang giao, 2=Hoàn thành, 3=Đã hủy
                                switch ($order['status']) {
                                    case 0:
                                        echo '<span class="status pending">Chờ xử lý</span>';
                                        break;
                                    case 1:
                                        echo '<span class="status shipping">Đang giao</span>';
                                        break;
                                    case 2:
                                        echo '<span class="status completed">Hoàn thành</span>';
                                        break;
                                    case 3:
                                        echo '<span class="status cancelled">Đã hủy</span>';
                                        break;
                                    default:
                                        echo '<span class="status unknown">Không xác định</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="ad_order_detail.php?order_id=<?= urlencode($order['order_id']) ?>" class="btn-detail">Xem chi tiết</a>
                                <!-- Có thể thêm nút xử lý khác nếu cần -->
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
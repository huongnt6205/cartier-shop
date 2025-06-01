<?php
require_once __DIR__ . '/../service/order_service.php';

// Lấy ID đơn hàng từ URL
$orderId = $_GET['order_id'] ?? null;
if (!$orderId) {
    echo "<p style='color:red;text-align:center;'>Thiếu mã đơn hàng.</p>";
    exit;
}

// Gọi lại tất cả đơn hàng (từ service) và tìm đơn hàng theo ID
$orders = getAllOrder();
$order = null;
foreach ($orders as $o) {
    if ($o['order_id'] == $orderId) {
        $order = $o;
        break;
    }
}

if (!$order) {
    echo "<p style='color:red;text-align:center;'>Không tìm thấy đơn hàng.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css" />
    <link rel="stylesheet" href="../admin/css/ad_order_details.css" />
    <link rel="stylesheet" href="../admin/css/ad_footer.css" />
    <link rel="stylesheet" href="../admin/css/ad_header.css" />
</head>
<body>
    <?php include 'ad_header.php'; ?>

    <section class="order-details-section">
        <h1>Chi tiết đơn hàng #<?= htmlspecialchars($order['order_id']) ?></h1>

        <div class="order-info">
            <p><strong>Khách hàng:</strong> <?= htmlspecialchars($order['customer_name']) ?></p>
            <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['customer_phone']) ?></p>
            <p><strong>Ngày đặt:</strong> <?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></p>
            <p><strong>Tổng tiền:</strong> <?= number_format($order['total_amount'], 0, ',', '.') ?> VND</p>
            <p><strong>Trạng thái:</strong>
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
            </p>
        </div>

        <h2>Danh sách sản phẩm</h2>
        <table class="order-items-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order['items'] as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['product_name']) ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                        <td><?= number_format($item['subtotal'], 0, ',', '.') ?> VND</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            <a href="ad_orders.php" class="btn-back">← Quay lại</a>
        </div>
    </section>

    <?php include 'ad_footer.php'; ?>
</body>
</html>

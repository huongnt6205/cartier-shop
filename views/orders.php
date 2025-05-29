<!-- trang trang thái đơn hàng  -->

<?php
session_start();
require_once __DIR__ . '/../service/order_service.php';

// Giả sử user đã đăng nhập, có user_id trong session
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Lấy tất cả đơn hàng (trong trường hợp thực tế bạn cần lọc theo user_id, bạn nên chỉnh hàm getAllOrder để nhận param user_id)
$orders = getAllOrder();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trạng thái đơn hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/orders.css" />
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="orders-section">
        <h1>Danh sách đơn hàng của bạn</h1>

        <?php if (empty($orders)): ?>
            <p>Bạn chưa có đơn hàng nào.</p>
        <?php else: ?>
            <?php foreach ($orders as $order): ?>
                <div class="order-card">
                    <h2>Đơn hàng #<?= htmlspecialchars($order['order_id']) ?></h2>

                    <p><strong>Khách hàng:</strong> <?= htmlspecialchars($order['customer_name'] ?? 'Chưa cập nhật') ?></p>
                    <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['customer_phone'] ?? 'Chưa cập nhật') ?></p>

                    <p><strong>Ngày đặt:</strong> <?= htmlspecialchars($order['order_date']) ?></p>
                    <p><strong>Tổng tiền:</strong> <?= number_format($order['total_amount'], 0, ',', '.') ?>₫</p>
                    <p><strong>Trạng thái:</strong>
                        <?php
                        $statusLabels = [
                            ORDER_PENDING => 'Đang xử lý',
                            ORDER_RECEIVED => 'Đã nhận',
                            ORDER_ORDERED => 'Đã đặt',
                            ORDER_CANCEL => 'Đã hủy',
                        ];
                        $status = $order['status'] ?? 'unknown';
                        echo $statusLabels[$status] ?? 'Không rõ';
                        ?>
                    </p>

                    <h3>Chi tiết sản phẩm:</h3>
                    <!-- Bảng chi tiết sản phẩm -->
                    <table class="order-items-table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order['items'] as $item): ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['product_name']) ?></td>
                                    <td><?= number_format($item['price'], 0, ',', '.') ?>₫</td>
                                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                                    <td><?= number_format($item['subtotal'], 0, ',', '.') ?>₫</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>
<?php
session_start();
require_once __DIR__ . "/../service/product_service.php";
require_once __DIR__ . "/../service/product_image_service.php";

// Tính tổng tiền giỏ hàng
$total = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $itemId => $quantity) {
        $item = getProductById($itemId);
        $total += $item['price'] * $quantity;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Thanh Toán | BeautyNest.vn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/checkout.css" />
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
    <?php @include 'header.php'; ?>

    <section class="checkout-section">
        <h2>Thanh Toán</h2>

        <form action="process_checkout.php" method="post" class="checkout-form">
            <div class="customer-info">
                <h3>Thông tin người nhận</h3>
                <label for="name">Tên người nhận <span>*</span></label>
                <input type="text" id="name" name="name" required placeholder="Nguyễn Văn A" />

                <label for="phone">Số điện thoại <span>*</span></label>
                <input type="tel" id="phone" name="phone" required pattern="[0-9]{9,12}" placeholder="0901234567" />

                <label for="address">Địa chỉ nhận hàng <span>*</span></label>
                <textarea id="address" name="address" rows="3" required placeholder="Số nhà, đường, quận, thành phố"></textarea>

                <label for="note">Ghi chú (tuỳ chọn)</label>
                <textarea id="note" name="note" rows="2" placeholder="Nhập ghi chú nếu có..."></textarea>
            </div>

            <div class="order-summary">
                <h3>Đơn hàng của bạn</h3>
                <?php if (!isset($_SESSION['cart'])): ?>
                    <p>Giỏ hàng của bạn đang trống.</p>
                <?php else: ?>
                    <ul class="product-list">
                        <?php foreach ($_SESSION['cart'] as $itemId => $quantity) { 
                            $item = getProductById($itemId);
                            $itemImage = getProductPrimaryImageByProductId($itemId);
                        ?>
                            <li>
                                <img src="<?=$itemImage['image_url'] ?? ""?>"/>
                                <div>
                                    <p class="product-name"><?=$item['name']?></p>
                                    <p>Số lượng: <?=$quantity?></p>
                                    <p>Giá: <?=$item['price']?> VND</p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="summary-details">
                        <p><span>Tạm tính:</span> $<?php echo number_format($total, 2); ?></p>
                        <p class="final-total"><span>Tổng cộng:</span> $<?php echo number_format($total, 2); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="pay-btn">Thanh Toán</button>
        </form>
    </section>

    <?php @include 'footer.php'; ?>
</body>

</html>
<?php
session_start();
require_once __DIR__ . '/../service/product_service.php';
require_once __DIR__ . '/../service/product_image_service.php';
require_once __DIR__ . '/../service/cart_service.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $productId = $_POST['product_id'] ?? null;

   // Xử lý xóa
   if (isset($_POST['action']) && $_POST['action'] === 'remove' && $productId) {
      removeFromCart($productId);
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit();
   }

   // Xử lý cập nhật số lượng
   $quantity = $_POST['quantity'] ?? null;
   if ($productId && is_numeric($quantity)) {
      updateCartQuantity($productId, (int)$quantity);
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit();
   }
}
?>


<!DOCTYPE html>
<html lang="vi">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Giỏ hàng | BeautyNest.vn</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link rel="stylesheet" href="/cartier-shop/css/app.css">
   <link rel="stylesheet" href="/cartier-shop/css/cart.css">
   <link rel="stylesheet" href="/cartier-shop/css/header.css">
   <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
   <?php include 'header.php'; ?>

   <div class="cart-container">
      <!-- Bên trái: danh sách sản phẩm -->
      <div class="cart-left">
         <h2>🛒 Giỏ hàng của bạn</h2>

         <?php if (empty($_SESSION['cart'])): ?>
            <p>Giỏ hàng của bạn đang trống.</p>
         <?php else: ?>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $quantity):
               $item = getProductById($id);
               $imageUrl = getProductPrimaryImageByProductId($id);
               $subtotal = $item['price'] * $quantity;
               $total += $subtotal;
            ?>
               <div class="cart-item">
                  <img src="<?= $imageUrl['image_url'] ?? "" ?>">
                  <div class="item-info">
                     <h4><?= $item['name'] ?></h4>
                     <p>Giá: <?= number_format($item['price'], 2) ?> VND </p>
                     <form method="post" action="" class="quantity-control">
                        <input type="hidden" name="product_id" value="<?= $id ?>">
                        <input type="number" name="quantity" value="<?= $quantity ?>" min="1">
                     </form>
                  </div>
                  <form method="post" action="">
                     <input type="hidden" name="product_id" value="<?= $id ?>">
                     <input type="hidden" name="action" value="remove">
                     <button type="submit" class="remove-btn"><i class="fa-solid fa-trash"></i></button>
                  </form>
               </div>
            <?php endforeach; ?>
         <?php endif; ?>
      </div>

      <!-- Bên phải: tổng và thanh toán -->
      <div class="cart-right">
         <h3>Tổng thanh toán</h3>
         <div class="summary-line">
            <span>Tạm tính:</span><span><?php echo number_format($total ?? 0, 2); ?> VND </span>
         </div>
         <div class="summary-line">
            <span>Phí vận chuyển:</span><span>Miễn phí</span>
         </div>
         <div class="summary-line total">
            <span>Tổng cộng:</span><span> <?php echo number_format($total ?? 0, 2); ?> VND </span>
         </div>

         <div class="discount-code">
            <input type="text" placeholder="Nhập mã giảm giá">
            <button>Áp dụng</button>
         </div>
         <form action="checkout.php" method="get">
            <a href="/cartier-shop/views/checkout.php">
               <button type="submit" class="buy-now-btn"> Mua ngay</button>
            </a>
         </form>
      </div>
   </div>

   <?php include 'footer.php'; ?>
   <script>
      document.querySelectorAll('.quantity-control input[type="number"]').forEach(input => {
         input.addEventListener('change', function() {
            this.form.submit();
         });
      });
   </script>
</body>

</html>
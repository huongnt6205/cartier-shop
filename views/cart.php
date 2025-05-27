<?php
session_start();
require_once __DIR__ . '/../service/product_service.php';
require_once __DIR__ . '/../service/product_image_service.php';
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
                  <img src="<?=$imageUrl['image_url'] ?? ""?>">
                  <div class="item-info">
                     <h4><?=$item['name']?></h4>
                     <p>Giá: $<?=number_format($item['price'], 2)?></p>
                     <form method="post" action="update_cart.php" class="quantity-control">
                        <input type="hidden" name="product_id" value="<?=$id?>">
                        <button type="submit" name="action" value="decrease">-</button>
                        <input type="number" name="quantity" value="<?=$quantity?>" min="1">
                        <button type="submit" name="action" value="increase">+</button>
                     </form>
                  </div>
                  <form method="post" action="remove_from_cart.php">
                     <input type="hidden" name="product_id" value="<?=$id?>">
                     <button class="remove-btn" type="submit"><i class="fa-solid fa-trash"></i></button>
                  </form>
               </div>
            <?php endforeach; ?>
         <?php endif; ?>
      </div>

      <!-- Bên phải: tổng và thanh toán -->
      <div class="cart-right">
         <h3>Tổng thanh toán</h3>
         <div class="summary-line">
            <span>Tạm tính:</span><span>$<?php echo number_format($total ?? 0, 2); ?></span>
         </div>
         <div class="summary-line">
            <span>Phí vận chuyển:</span><span>Miễn phí</span>
         </div>
         <div class="summary-line total">
            <span>Tổng cộng:</span><span>$<?php echo number_format($total ?? 0, 2); ?></span>
         </div>

         <div class="discount-code">
            <input type="text" placeholder="Nhập mã giảm giá">
            <button>Áp dụng</button>
         </div>
         <form action="checkout.php" method="get">
            <a href="/cartier-shop/views/checkout.php">
               <button type="submit" class="buy-now-btn"> Mua ngay</button>
            </a>
      </div>
   </div>

   <?php include 'footer.php'; ?>
</body>

</html>
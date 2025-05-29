<?php
require_once __DIR__ . "/../service/order_service.php";
?>


<!DOCTYPE html>
<html lang="vi">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Trang quản trị</title>
   <link rel="stylesheet" href="../admin/css/ad_footer.css">
</head>

<body>
   <section class="dashboard">
      <h1 class="title">Trang Quản Trị</h1>
      <div class="box-container">
         <!-- Đơn hàng -->
         <div class="box">
            <h3><?= $orders?> <span>đơn hàng</span></h3>
            <p><a href="ad_orders.php">Xem chi tiết</a></p>
         </div>

         <!-- Sản phẩm -->
         <div class="box">
            <h3><?= $productCount ?> <span>sản phẩm</span></h3>
            <p><a href="ad_products.php">Xem chi tiết</a></p>
         </div>

         <!-- Người dùng -->
         <div class="box">
            <h3><?= $userCount ?> <span>người dùng</span></h3>
            <p><a href="ad_users.php">Xem chi tiết</a></p>
         </div>

         <!-- Admin -->
         <div class="box">
            <h3><?= $adminCount ?> <span>quản trị viên</span></h3>
            <p><a href="ad_admins.php">Xem chi tiết</a></p>
         </div>

         <!-- Tin nhắn -->
         <div class="box">
            <h3><?= $messageCount ?> <span>tin nhắn</span></h3>
            <p><a href="ad_contact.php">Xem chi tiết</a></p>
         </div>

      </div>
   </section>

   <?php include 'ad_footer.php' ?>

</body>

</html>
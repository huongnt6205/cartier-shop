<!-- trang chính -->

<?php
require_once __DIR__ . "/../service/order_service.php";
require_once __DIR__ . '/../service/users_service.php';
require_once __DIR__ . '/../service/message_service.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quản trị admin</title>
   <link rel="stylesheet" href="../admin/css/ad_app.css" />
   <link rel="stylesheet" href="../admin/css/ad_page.css">
   <link rel="stylesheet" href="../admin/css/ad_footer.css" />
   <link rel="stylesheet" href="../admin/css/ad_header.css" />
   <title>Trang quản trị</title>
</head>

<body>
   <?php include 'ad_header.php' ?>
   <section class="dashboard">
      <h1 class="title">Trang Quản Trị</h1>
      <div class="box-container">
         <!-- Đơn hàng -->
         <div class="box">
            <?php
            $orders = getAllOrder();

            $totalOrders = count($orders);
            $totalProducts = 0;
            $totalRevenue = 0;

            foreach ($orders as $order) {
               foreach ($order['items'] as $item) {
                  $totalProducts += $item['quantity'];
                  $product = getProductById($item['product_id']);
                  $totalRevenue += $product['price'] * $item['quantity'];
               }
            }
            ?>
            <h1> Quản lí đơn hàng đã mua </h1>
            <h3><?= $totalOrders ?> <span>đơn hàng</span></h3>
            <h6> Tổng sản phẩm đã bán ra: <span> <?= $totalProducts ?> </span> </h6>
            <h4> Doanh thu đạt được: <span> <?= number_format($totalRevenue, 0, ',', '.') ?> VND</span></h4>
            <p><a href="ad_orders.php">Xem chi tiết</a></p>
         </div>

         <!-- Quản lí sản phẩm -->
         <div class="box">
            <?php $userCount = getProductCount(); ?>
            <h1>Quản lí Sản phẩm của Cartier Beauty </h1>
            <h3><?= htmlspecialchars($userCount) ?> <span> sản phẩm </span></h3>
            <p><a href="ad_shops.php">Xem chi tiết</a></p>
         </div>
         <!-- Người dùng -->
         <div class="box">
            <?php $userCount = getUserCount('user'); ?>
            <h1>Quản lí tài khoản đã đăng ký Website Cartier Beauty </h1>
            <p>Đây là trang bảo mật và không thể chỉnh sửa</p>
            <h3><?= htmlspecialchars($userCount) ?> <span>người dùng</span></h3>
            <p><a href="ad_users.php">Xem chi tiết</a></p>
         </div>

         <!-- Admin -->
         <div class="box">
            <?php $adminCount = getUserCount('admin'); ?>
            <h1>Quản lí tài khoản Quản Trị Viên của Website Cartier Beauty </h1>
            <h3><?= htmlspecialchars($adminCount) ?> <span>quản trị viên</span></h3>
            <p><a href="ad_admins.php">Xem chi tiết</a></p>
         </div>

         <!-- Tin nhắn -->
         <div class="box">
            <?php
            $messageCount = getMessageCount();
            ?>
            <h1>Quản lí liên hệ người dùng</h1>
            <h3><?= htmlspecialchars($messageCount) ?> <span>tin nhắn</span></h3>
            <p><a href="ad_contacts.php">Xem chi tiết</a></p>
         </div>

      </div>
   </section>

   <?php include 'ad_footer.php' ?>

</body>

</html>
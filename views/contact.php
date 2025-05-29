<!-- contact.php -->

<?php
require_once __DIR__ . '/../service/contacts_service.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = $_POST['name'];
   $order_id = $_POST['order_id'];
   $phone = $_POST['phone'];
   $message = $_POST['message'];

   $success = saveContact([
      'name' => $name,
      'order_id' => $order_id,
      'phone' => $phone,
      'message' => $message
   ]);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liên hệ</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link rel="stylesheet" href="/cartier-shop/css/app.css">
   <link rel="stylesheet" href="/cartier-shop/css/contact.css">
   <link rel="stylesheet" href="/cartier-shop/css/header.css">
   <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
   <?php include 'header.php'; ?>

   <div class="contact-container">
      <h1>Liên hệ với chúng tôi</h1>

      <?php if (isset($success) && $success): ?>
         <p class="message-success">Tin nhắn đã được gửi thành công!</p>
      <?php elseif (isset($success)): ?>
         <p class="message-error">Gửi tin nhắn thất bại!</p>
      <?php endif; ?>

      <form method="post">
         <label for="name">Tên:</label>
         <input type="text" name="name" id="name" required>

         <label for="order_id">Mã đơn hàng:</label>
         <input type="number" name="order_id" id="order_id" required>

         <label for="phone">SĐT:</label>
         <input type="text" name="phone" id="phone" required>

         <label for="message">Nội dung:</label>
         <textarea name="message" id="message" rows="4" required></textarea>

         <button type="submit">Gửi</button>
      </form>
   </div>

   <?php include 'footer.php'; ?>
</body>

</html>
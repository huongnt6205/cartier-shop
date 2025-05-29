<!-- contact.php -->
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

   <div class="contact-page-wrapper">
      <div class="contact-container">
         <h1>LIÊN HỆ <span>VỚI CHÚNG TÔI</span></h1>
         <h3>Vui lòng điền đầy đủ thông tin bên dưới</h3>

         <form method="post" action="submit_contact.php">
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="order_id">Mã đơn hàng:</label>
            <input type="number" id="order_id" name="order_id" required>

            <label for="message">Lời nhắn:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" class="btn-gui">GỬI</button>
         </form>
      </div>
   </div>

   <?php include 'footer.php'; ?>
</body>

</html>
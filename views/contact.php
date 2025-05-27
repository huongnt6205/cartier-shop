   <!-- trang liên hệ -->
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Contact Us</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
      <link rel="stylesheet" href="/cartier-shop/css/app.css">
      <link rel="stylesheet" href="/cartier-shop/css/contact.css">
      <link rel="stylesheet" href="/cartier-shop/css/header.css">
      <link rel="stylesheet" href="/cartier-shop/css/footer.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
   </head>

   <body>
      <?php include 'header.php'; ?>
      
      <div class="contact-page-wrapper">
         <div class="contact-container">
            <h1>LIÊN HỆ <span>VỚI CHÚNG TÔI</span></h1>
            <h3>Chúng tôi có thể giúp gì được cho bạn?</h3>

            <form method="post" action="submit_contact.php">
               <label for="name">Tên:</label>
               <input type="text" id="name" name="name" required>

               <label for="email">Email:</label>
               <input type="email" id="email" name="email" required>

               <label for="message">Lời nhắn:</label>
               <textarea id="message" name="message" rows="5" required></textarea>

               <button type="submit" class="btn-gui">GỬI</button>
            </form>
         </div>
      </div>
      <?php include 'footer.php'; ?>
   </body>

   </html>
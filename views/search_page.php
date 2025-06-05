<?php
require __DIR__ . "/../service/product_service.php";
require __DIR__ . "/../service/product_image_service.php";

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Tìm kiếm sản phẩm - Cartier Beauty.vn</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
   <link rel="stylesheet" href="/cartier-shop/css/app.css" />
   <link rel="stylesheet" href="/cartier-shop/css/shop.css" />
   <link rel="stylesheet" href="/cartier-shop/css/header.css" />
   <link rel="stylesheet" href="/cartier-shop/css/footer.css" />
</head>

<body>
   <?php include 'header.php'; ?>

   <section class="page-header">
      
   </section>

   <section class="product">
      <div>
        <h2 style="font-size: 25px; text-align: center; color: #d63384">Kết quả tìm kiếm: <?= htmlspecialchars($keyword) ?></h2>
      </div>
      <div class="pro-container">

         <?php
         if ($keyword === '') {
            echo '<p>Vui lòng nhập từ khóa tìm kiếm.</p>';
         } else {
            $products = searchProductsByName($keyword);

            if (empty($products)) {
               echo '<p>Không tìm thấy sản phẩm nào phù hợp với từ khóa "' . htmlspecialchars($keyword) . '".</p>';
            } else {
               foreach ($products as $product) {
                  $image = getProductPrimaryImageByProductId($product['id']);
                  echo '<div class="pro" onclick="window.location.href=\'sproduct.php?product_id=' . htmlspecialchars($product['id']) . '\'">';
                  if ($image) {
                     echo '<img src="' . htmlspecialchars($image['image_url']) . '" alt="' . htmlspecialchars($product['name']) . '"/>';
                  } else {
                     echo '<img src="/cartier-shop/images/default-product.jpg" alt="No image" />';
                  }
                  echo '<div class="des">';
                  echo '<h5>' . htmlspecialchars($product['name']) . '</h5>';
                  echo '<div class="star">';
                  for ($i = 0; $i < 5; $i++) {
                     echo '<i class="fa-solid fa-star"></i>';
                  }
                  echo '</div>';
                  echo '<h4>' . number_format($product["price"]) . ' VND</h4>';
                  echo '</div>';
                  echo '<a href="#"><i class="fa-solid fa-cart-shopping"></i></a>';
                  echo '</div>';
               }
            }
         }
         ?>

      </div>
   </section>

   <?php include 'footer.php'; ?>
</body>

</html>
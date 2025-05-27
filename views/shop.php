<?php
require __DIR__ . "/../service/product_service.php";
require __DIR__ . "/../service/product_image_service.php";
if (isset($_GET['category_id'])) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cartier Beauty.vn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/shop.css">
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="page-header"></section>

    <section class="product">
        <div class="pro-container">

            <?php
            foreach ($categories as $category) {
                echo '<h2 id="' . $category['id'] . '" class="category-title">' . $category['name'] . '</h2>'
            ?>

                <div class="pro-container">
                    <?php
                    $products = getByCategory($category['id']);
                    foreach ($products as $product) {
                        $image = getProductPrimaryImageByProductId($product['id']);
                        echo '<div class="pro" onclick="window.location.href=\'sproduct.php?product_id='. $product['id'] .'\'">';
                        if ($image) {
                            echo '<img src="'. $image['image_url'] .'"/>';
                        }
                        echo '<div class="des">';
                        echo '<h5>' . $product['name'] . '</h5>';
                        echo '<div class="star">';
                        for ($i = 0; $i < 5; $i++) {
                            echo '<i class="fa-solid fa-star"></i>';
                        }
                        echo '</div>';
                        echo '<h4>$' . $product["price"] . '</h4>';
                        echo '</div>';
                        echo '<a href="#"><i class="fa-solid fa-cart-shopping"></i></a>';
                        echo '</div>';
                    }
                    ?>
                </div>

            <?php
            }
            ?>

        </div>
    </section>

    <section class="pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
    </section>

    <section class="news-letter section-m1">
        <div class="latter">
            <div class="newstext">
                <h4>Đăng ký ngay để</h4>
                <p>Nhận email cập nhật các ưu đãi mới nhất và <span>đặc biệt của chúng tôi</span>.</p>
            </div>
            <div class="form">
                <input type="text" placeholder="Địa chỉ email của bạn" />
                <button>Đăng ký</button>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>
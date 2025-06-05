<?php
require __DIR__ . "/../service/product_service.php";
require __DIR__ . "/../service/product_image_service.php";

// Danh sách category tạm thời, bạn có thể thay bằng lấy từ DB
$categories = [
    ['id' => 1, 'name' => 'Skincare'],
    ['id' => 2, 'name' => 'Makeup'],
    // Thêm category khác nếu cần
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cartier Beauty.vn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="/cartier-shop/css/app.css" />
    <link rel="stylesheet" href="/cartier-shop/css/shop.css" />
    <link rel="stylesheet" href="/cartier-shop/css/header.css" />
    <link rel="stylesheet" href="/cartier-shop/css/footer.css" />
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="page-header"></section>

    <section class="product">
        <div class="pro-container">

            <?php
            foreach ($categories as $category) {
                echo '<h2 id="' . htmlspecialchars($category['id']) . '" class="category-title">' . htmlspecialchars($category['name']) . '</h2>';

                // Lấy sản phẩm không sale theo category
                $products = getNonSaleProductsByCategory($category['id']);

                if (empty($products)) {
                    echo '<p>Chưa có sản phẩm trong danh mục này.</p>';
                } else {
                    echo '<div class="pro-container">';
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
                    echo '</div>';
                }
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
                <a href="signup.php">
                    <button>Đăng ký</button>
                </a>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>

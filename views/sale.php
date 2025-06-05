<?php
require_once __DIR__ . "/../service/product_service.php";
require_once __DIR__ . "/../service/product_image_service.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cartier Beauty.vn - Sale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="/cartier-shop/css/app.css" />
    <link rel="stylesheet" href="/cartier-shop/css/sale.css" />
    <link rel="stylesheet" href="/cartier-shop/css/header.css" />
    <link rel="stylesheet" href="/cartier-shop/css/footer.css" />
    <style>
        .old-price {
            text-decoration: line-through;
            color: gray;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="page-header">
        <h1>Sản phẩm đang giảm giá</h1>
    </section>

    <section class="product">
        <?php foreach ($categories as $category):
            echo '<h2 id="' . htmlspecialchars($category['id']) . '" class="category-title">' . htmlspecialchars($category['name']) . '</h2>';
        ?>

            <div class="pro-container">
                <?php
                $saleProducts = getSaleProductsByCategory($category['id']);
                if (count($saleProducts) === 0) {
                    echo '<p>Không có sản phẩm giảm giá nào trong danh mục này.</p>';
                } else {
                    foreach ($saleProducts as $product):
                        $image = getProductPrimaryImageByProductId($product['id']);
                ?>
                        <div class="pro" onclick="window.location.href='sproduct.php?product_id=<?= htmlspecialchars($product['id']) ?>'">
                            <?php if ($image): ?>
                                <img src="<?= htmlspecialchars($image['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" />
                            <?php else: ?>
                                <img src="/cartier-shop/images/default-product.jpg" alt="No Image" />
                            <?php endif; ?>
                            <div class="des">
                                <h5><?= htmlspecialchars($product['name']) ?></h5>
                                <div class="star">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <i class="fa-solid fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <h4>
                                    <?php if (!empty($product['old_price']) && $product['old_price'] > 0): ?>
                                        <span class="old-price"><?= number_format($product['old_price']) ?> VND <br></span>
                                    <?php endif; ?>
                                    <span style="color: red;"><?= number_format($product['price']) ?> VND</span>
                                </h4>
                            </div>
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                <?php
                    endforeach;
                }
                ?>
            </div>
        <?php endforeach; ?>
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
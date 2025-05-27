<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartier Beauty.vn</title>
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/sale.css">
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="page-header"></section>

    <section class="product">
        <?php echo '<div class="sale-banner"> #SALE UP TO 50%</div>'; ?>

        <div class="pro-container">
            <?php
            // All products
            $products = [
                // Cushion
                ["img" => "cushion/dr3.jpg", "price" => 220, "old_price" => 600, "name" => "Cushion DIOR", "category" => "Cushion"],
                ["img" => "cushion/po2.jpg", "price" => 400, "old_price" => 800, "name" => "Cushion SKKN", "category" => "Cushion"],
                ["img" => "cushion/lg1.jpg", "price" => 600, "old_price" => 1000, "name" => "Cushion Laneige", "category" => "Cushion"],
                ["img" => "cushion/ap1.jpg", "price" => 350, "old_price" => 500, "name" => "Cushion AP", "category" => "Cushion"],

                // Eyeshadow
                ["img" => "eyeshadow/ce1.jpg", "price" => 840, "old_price" => 1500, "name" => "3CE", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/mt1.jpg", "price" => 450, "old_price" => 600, "name" => "Merythod", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/pr1.jpg", "price" => 220, "old_price" => 450, "name" => "Peripera", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/jd1.jpg", "price" => 600, "old_price" => 900, "name" => "Jully Doll", "category" => "Phấn mắt"],

                // Blusher
                ["img" => "blusher/ce1.jpg", "price" => 220, "old_price" => 700, "name" => "3CE Blusher", "category" => "Má hồng"],
                ["img" => "blusher/dr1.jpg", "price" => 400, "old_price" => 600, "name" => "DIOR Blusher", "category" => "Má hồng"],
                ["img" => "blusher/ys2.jpg", "price" => 600, "old_price" => 1200, "name" => "YSL Blusher", "category" => "Má hồng"],
                ["img" => "blusher/red1.jpg", "price" => 350, "old_price" => 550, "name" => "Red Chamber Blusher", "category" => "Má hồng"],

                // Lipsticks
                ["img" => "lips/bbia1.jpg", "price" => 199, "old_price" => 600, "name" => "Bbia Last Lipstick", "category" => "Son môi"],
                ["img" => "lips/dr1.jpg", "price" => 450, "old_price" => 900, "name" => "DIOR Lipstick", "category" => "Son môi"],
                ["img" => "lips/fk1.jpg", "price" => 220, "old_price" => 400, "name" => "Flower Knows Lipstick", "category" => "Son môi"],
                ["img" => "lips/mc1.jpg", "price" => 600, "old_price" => 800, "name" => "MAC Lipstick", "category" => "Son môi"],
            ];

            // Group products by category
            $grouped = [];
            foreach ($products as $product) {
                $grouped[$product["category"]][] = $product;
            }

            // Render grouped products
            foreach ($grouped as $category => $items) {
                echo '<div class="category-section">';
                echo '<h2 class="category-title">' . strtoupper($category) . '</h2>';
                echo '<div class="pro-container">';

                foreach ($items as $product) {
                    echo '<div class="pro" onclick="window.location.href=\'sproduct.php\'">';
                    echo '<img src="../images/products/' . $product["img"] . '" alt="">';
                    echo '<div class="des">';
                    echo '<span>New</span>';
                    echo '<h5>' . $product["name"] . '</h5>';
                    echo '<div class="star">';
                    for ($i = 0; $i < 5; $i++) {
                        echo '<i class="fa-solid fa-star"></i>';
                    }
                    echo '</div>';
                    echo '<h4><span class="old-price">$' . $product["old_price"] . '</span> $' . $product["price"] . '</h4>';
                    echo '</div>';
                    echo '<a href="#"><i class="fa-solid fa-cart-shopping"></i></a>';
                    echo '</div>';
                }

                echo '</div></div>';
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
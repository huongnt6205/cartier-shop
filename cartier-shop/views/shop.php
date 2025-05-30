<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartier Beauty.vn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/shop.css">
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="page-header">

    </section>
    <section class="product">
        <div class="pro-container">
            <!-- Product item example -->
            <?php
            $products = [
                ["img" => "cushion/dr3.jpg", "price" => 220, "name" => "Cushion DIOR", "category" => "Cushion"],
                ["img" => "cushion/po2.jpg", "price" => 400, "name" => "Cushion SKKN", "category" => "Cushion"],
                ["img" => "cushion/lg1.jpg", "price" => 600, "name" => "Cushion Laneige", "category" => "Cushion"],
                ["img" => "cushion/ap1.jpg", "price" => 350, "name" => "Cushion AP", "category" => "Cushion"],
                ["img" => "cushion/tt1.jpg", "price" => 480, "name" => "Cushion TIRTIR", "category" => "Cushion"],
                ["img" => "cushion/ep3.jpg", "price" => 850, "name" => "Cushion Espoir", "category" => "Cushion"],
                ["img" => "cushion/ce1.jpg", "price" => 490, "name" => "Cushion 3CE", "category" => "Cushion"],
                ["img" => "cushion/ys1.jpg", "price" => 1000, "name" => "Cushion YSL", "category" => "Cushion"],

                ["img" => "eyeshadow/ce1.jpg", "price" => 840, "name" => "3CE", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/mt1.jpg", "price" => 450, "name" => "Merythod", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/pr1.jpg", "price" => 220, "name" => "Peripera", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/jd1.jpg", "price" => 600, "name" => "Jully Doll", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/dq1.jpg", "price" => 340, "name" => "Daique", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/rm1.jpg", "price" => 420, "name" => "Romand", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/fl1.jpg", "price" => 290, "name" => "Flower Knows", "category" => "Phấn mắt"],
                ["img" => "eyeshadow/ra1.jpg", "price" => 220, "name" => "Pera", "category" => "Phấn mắt"],
            ];


            // Group products by category
            $grouped = [];
            foreach ($products as $product) {
                $grouped[$product["category"]][] = $product;
            }

            // Output each category section
            foreach ($grouped as $category => $items) {
                echo '<h2 class="category-title">' . strtoupper($category) . '</h2>';
                echo '<div class="pro-container">';
                foreach ($items as $product) {
                    echo '<div class="pro" onclick="window.location.href=\'sproduct.html\'">';
                    echo '<img src="../images/products/' . $product["img"] . '" alt="">';
                    echo '<div class="des">';
                    echo '<span>New</span>';
                    echo '<h5>' . $product["name"] . '</h5>';
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
                echo '</div>';
            }
            ?>

            <?php
            $products = [
                ["img" => "blusher/ce1.jpg", "price" => 220, "name" => "3CE Blusher", "category" => "Má hồng"],
                ["img" => "blusher/dr1.jpg", "price" => 400, "name" => "DIOR Blusher", "category" => "Má hồng"],
                ["img" => "blusher/ys2.jpg", "price" => 600, "name" => "YSL Blusher", "category" => "Má hồng"],
                ["img" => "blusher/red1.jpg", "price" => 350, "name" => "Red Chamber Blusher", "category" => "Má hồng"],
                ["img" => "blusher/into1.jpg", "price" => 380, "name" => "Into You Blusher", "category" => "Má hồng"],
                ["img" => "blusher/pr1.jpg", "price" => 250, "name" => "Peripera Blusher", "category" => "Má hồng"],
                ["img" => "blusher/rm1.jpg", "price" => 280, "name" => "Romand Blusher", "category" => "Má hồng"],
                ["img" => "blusher/fk1.jpg", "price" => 420, "name" => "Flower Knows", "category" => "Má hồng"],

                ["img" => "lips/bbia1.jpg", "price" => 199, "name" => "Bbia Last Lipstick", "category" => "Son môi"],
                ["img" => "lips/dr1.jpg", "price" => 450, "name" => "DIOR Lipstick", "category" => "Son môi"],
                ["img" => "lips/fk1.jpg", "price" => 220, "name" => "Flower Knows Lipstick", "category" => "Son môi"],
                ["img" => "lips/mc1.jpg", "price" => 600, "name" => "MAC Lipstick", "category" => "Son môi"],
                ["img" => "lips/ns3.jpg", "price" => 340, "name" => "NARS Lipstick", "category" => "Son môi"],
                ["img" => "lips/fw3.jpg", "price" => 420, "name" => "Fwee Tint", "category" => "Son môi"],
                ["img" => "lips/lily2.jpg", "price" => 290, "name" => "Lilybyred Ink", "category" => "Son môi"],
                ["img" => "lips/rm1.jpg", "price" => 220, "name" => "Romand Juicy Tint", "category" => "Son môi"],
            ];

            // Group products by category
            $grouped = [];
            foreach ($products as $product) {
                $grouped[$product["category"]][] = $product;
            }

            // Output each category section
            foreach ($grouped as $category => $items) {
                echo '<h2 class="category-title">' . strtoupper($category) . '</h2>';
                echo '<div class="pro-container">';
                foreach ($items as $product) {
                    echo '<div class="pro" onclick="window.location.href=\'sproduct.html\'">';
                    echo '<img src="../images/products/' . $product["img"] . '" alt="">';
                    echo '<div class="des">';
                    echo '<span>New</span>';
                    echo '<h5>' . $product["name"] . '</h5>';
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
                echo '</div>';
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
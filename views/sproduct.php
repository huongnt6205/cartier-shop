<?php
require __DIR__ . "/../service/product_service.php";
require __DIR__ . "/../service/product_image_service.php";
require_once __DIR__ . "/../service/cart_service.php";
require_once __DIR__ . '/../service/review_service.php';
$review_message = "";
$submitted_reviews = [];

if (isset($_GET['product_id'])) {
    $product = getProductById($_GET['product_id']);
    $images = getProductImageByProductId($product['id']);
}

// ✅ Xử lý gửi đánh giá tại đây
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review'])) {
    $name = htmlspecialchars($_POST['name']);
    $reviewText = htmlspecialchars($_POST['review']);
    $rating = (int)$_POST['rating'];
    saveReview($product['id'], $name, $reviewText, $rating);
    $review_message = "🎉 Cảm ơn bạn đã đánh giá sản phẩm!";
}

// Lấy danh sách đánh giá từ DB
$submitted_reviews = getReviewsByProductId($product['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BeautyNest.vn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/sproduct.css">
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="prodetails">
        <div class="single-pri-image">
            <?php if (count($images) > 0): ?>
                <img src="<?= $images[0]['image_url'] ?>" width="100%" id="MainImg" alt="">
            <?php endif; ?>

            <div class="small-img-group">
                <?php foreach ($images as $img): ?>
                    <div class="small-img-col">
                        <img src="<?= $img['image_url'] ?>" class="smallimg" alt="">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="single-pro-details">
            <h3><?= $product['name'] ?></h3>
            <h2><?= number_format($product['price'], 0, ',', '.') ?> VND</h2>
            <div class="action-buttons">
                <label for="quantity" class="quantity-label">Số lượng:</label>
                <div class="quantity-selector">
                    <input type="number" value="1" min="1" id="quantity">
                </div>
                <div class="btn-click">
                    <button class="add-cart">🛒 Thêm vào giỏ</button>
                    <a href="checkout.php"><button class="buy-now">🛍 Mua ngay</button></a>
                </div>
            </div>

            <h4>Thông tin sản phẩm</h4>
            <p>Trạng thái: còn hàng!</p>
            <span><?= $product['description'] ?></span>
        </div>
    </section>

    <section class="product-reviews">
        <h4>Khách hàng đã đánh giá</h4>
        <!-- Đánh giá vừa gửi -->
        <?php foreach ($submitted_reviews as $r): ?>
            <div class="review">
                <div class="review-header">
                    <strong><?= $r['name'] ?></strong>
                    <div class="stars"><?= str_repeat('⭐️', $r['rating']) ?></div>
                </div>
                <p><?= $r['review'] ?></p>
            </div>
        <?php endforeach; ?>

        <!-- Form gửi đánh giá -->
        <form class="review-form" method="post">
            <h5>Gửi đánh giá của bạn</h5>

            <?php if (!empty($review_message)): ?>
                <p style="color: green; font-weight: bold;"><?= $review_message ?></p>
            <?php endif; ?>

            <input type="text" name="name" placeholder="Tên của bạn" required>
            <textarea name="review" rows="4" placeholder="Cảm nhận sản phẩm..." required></textarea>

            <div class="rating-select">
                <label>Đánh giá chất lượng sản phẩm:</label>
                <select name="rating" required>
                    <option value="">Chọn sao</option>
                    <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                    <option value="4">⭐️⭐️⭐️⭐️</option>
                    <option value="3">⭐️⭐️⭐️</option>
                    <option value="2">⭐️⭐️</option>
                    <option value="1">⭐️</option>
                </select>
            </div>
            <button type="submit">Gửi đánh giá</button>
        </form>
    </section>

    <section class="related-products">
        <h4>Sản phẩm liên quan</h4>
        <div class="related-product-container">
            <?php
            $category_id = $product['category_id'];
            $related_products = getByCategory($category_id);
            $count = 0;

            foreach ($related_products as $related_product) {
                if ($related_product['id'] == $product['id']) continue;

                $image = getProductPrimaryImageByProductId($related_product['id']);
            ?>
                <div class="related-product" onclick="window.location.href='sproduct.php?product_id=<?= $related_product['id'] ?>'">
                    <?php if ($image): ?>
                        <img src="<?= $image['image_url'] ?>" alt="<?= $related_product['name'] ?>">
                    <?php endif; ?>
                    <h5><?= $related_product['name'] ?></h5>
                    <p><?= number_format($related_product['price'], 0, ',', '.') ?> VND</p>
                    <button>Mua ngay</button>
                </div>
            <?php
                $count++;
                if ($count >= 4) break;
            }
            ?>
        </div>
    </section>
    <div id="cartModal" class="modal" style="display:none;">
        <div class="modal-content">
            <p>✅ Thêm vào giỏ hàng thành công!</p>
            <button id="okButton">OK</button>
        </div>
    </div>

    <script>
        const addToCart = document.querySelector('.add-cart');
        addToCart.addEventListener('click', async () => {
            const quantity = document.getElementById('quantity').value;
            const formData = new FormData();
            formData.append('product_id', <?= $product['id'] ?>);
            formData.append('quantity', parseInt(quantity));

            const response = await fetch('/cartier-shop/api/add_to_cart_api.php', {
                method: 'POST',
                body: formData,
                credentials: 'include'
            });

            if (!response.ok) {
                alert('Lỗi khi thêm vào giỏ hàng!');
                return;
            }

            // Hiển thị modal
            document.getElementById('cartModal').style.display = 'flex';

            // Khi nhấn OK -> reload
            document.getElementById('okButton').addEventListener('click', () => {
                window.location.reload();
            });
        });
        
        // Đổi ảnh chính khi nhấn ảnh nhỏ
        const mainImg = document.getElementById('MainImg');
        const smallImgs = document.querySelectorAll('.smallimg');
        smallImgs.forEach(img => {
            img.addEventListener('click', () => {
                mainImg.src = img.src;
            });
        });
    </script>
    <?php include 'footer.php'; ?>
</body>

</html>
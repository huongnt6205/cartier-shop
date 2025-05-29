<?php
require __DIR__ . "/../service/product_service.php";
require __DIR__ . "/../service/product_image_service.php";
require_once __DIR__ . "/../service/cart_service.php";

if (isset($_GET['product_id'])) {
    $product = getProductById($_GET['product_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BeautyNest.vn </title>
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
            <!-- Ảnh chính -->
            <?php
            $images = getProductImageByProductId($product['id']);
            if (count($images) > 0) {
                echo '<img src="' . $images[0]['image_url'] . '" width="100%" id="MainImg" alt="">';
            }
            ?>

            <!-- Ảnh nhỏ -->
            <div class="small-img-group">
                <?php
                foreach ($images as $img) {
                    echo '<div class="small-img-col">';
                    echo '<img src="' . $img['image_url'] . '" class="smallimg" alt="">';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <div class="single-pro-details">
            <h3> <?= $product['name'] ?> </h3>
            <h2> <?= $product['price'] ?> VND</h2>
            <div class="action-buttons">
                <label for="quantity" class="quantity-label">Số lượng:</label>
                <div class="quantity-selector">
                    <input type="number" value="1" min="1" id="quantity">
                </div>
                <button class="add-cart">🛒 Thêm vào giỏ</button>
                <button class="buy-now">🛍 Mua ngay</button>
            </div>

            <h4>Product Details</h4>
            <p>
                trạng thái: còn hàng!
            </p>
            <span>
                <?= $product['description'] ?>
            </span>
        </div>
    </section>

    <section class="product-reviews">
        <h4>Khách hàng đã đánh giá</h4>
        <div class="review">
            <div class="review-header">
                <strong>Sam </strong>
                <div class="stars">⭐️⭐️⭐️⭐️⭐️</div>
            </div>
            <p>Màu son cực đẹp, lên màu chuẩn và lâu trôi. Rất ưng ý!</p>
        </div>

        <div class="review">
            <div class="review-header">
                <strong>Bắp</strong>
                <div class="stars">⭐️⭐️⭐️⭐️</div>
            </div>
            <p>Chất son bóng nhẹ, không gây khô môi. Đáng mua!</p>
        </div>

        <!-- Biểu mẫu gửi đánh giá -->
        <form class="review-form" method="post" action="submit_review.php">
            <h5>Gửi đánh giá của bạn</h5>
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
            $related = [
                ["image" => "../images/products/lips/ns3.jpg", "name" => "NARS Lipstick", "price" => "$340"],
                ["image" => "../images/products/lips/dr1.jpg", "name" => "DIOR Lipstick", "price" => "$450"],
                ["image" => "../images/products/lips/fw2.jpg", "name" => "Fwee Tint", "price" => "$420"],
                ["image" => "../images/products/lips/fk1.jpg", "name" => "Flower Knows Lipstick", "price" => "$220"],
            ];

            foreach ($related as $item) {
                echo '<div class="related-product">';
                echo '<img src="' . $item["image"] . '" alt="' . $item["name"] . '">';
                echo '<h5>' . $item["name"] . '</h5>';
                echo '<p>' . $item["price"] . '</p>';
                echo '<button>Mua ngay</button>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <script>
        const addToCart = document.getElementsByClassName('add-cart')[0];
        addToCart.addEventListener('click', async () => {
            const quantity = document.getElementById('quantity');
            const formData = new FormData();
            formData.append('product_id', <?= $product['id'] ?>);
            formData.append('quantity', Number.parseInt(quantity.value));
            const response = await fetch('/cartier-shop/api/add_to_cart_api.php', {
                method: 'POST',
                body: formData,
                credentials: 'include'
            });
            if (!response.ok) {
                alert('Lỗi khi thêm vào giỏ hàng!!!');
            }
            const data = await response.json();
            const cartItemNumber = document.getElementById('cart-item-number');
            cartItemNumber.innerHTML = Object.keys(data).length;
        });
    </script>


    <?php include 'footer.php'; ?>
</body>

</html>
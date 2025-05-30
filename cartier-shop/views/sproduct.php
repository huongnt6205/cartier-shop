    <!-- chi tiết sản phẩm  -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> BeautyNest.vn </title>
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/sproduct.css">
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
        </head>

    <body>
        <?php include 'header.php'; ?>
        <section class="prodetails">
            <div class="single-pri-image">
                <img src="../images/products/lips/rm1.jpg" width="100%" id="MainImg" alt="">
                <div class="small-img-group">
                    <?php
                        $images = ["lips/rm1.jpg", "lips/rm2.jpg", "lips/rm3.jpg", "lips/rm4.jpg"];
                        foreach ($images as $img) {
                            echo '<div class="small-img-col">';
                            echo '<img src="../images/products/' . $img . '" width="100%" class="smallimg" alt="">';
                            echo '</div>';
                        }
                        ?>
                </div>
            </div>
            <div class="single-pro-details">
                <h2> Romand </h2>
                <h3> Son Kem Bóng Romand Juicy Lasting Tint mọng môi Hàn Quốc 5,5g đủ màu </h3>
                <h2> $139.00 </h2>
                <select>
                    <option>Select color</option>
                    <option> 12 </option>
                    <option> 07 </option>
                    <option> 23 </option>
                    <option> 06 </option>
                    <option> 24 </option>
                </select>
                <div class="action-buttons">
                    <label for="quantity" class="quantity-label">Số lượng:</label>
                    <div class="quantity-selector">
                        <button type="button" class="qty-btn minus">-</button>
                        <input type="number" value="1" min="1" id="quantity">
                        <button type="button" class="qty-btn plus">+</button>
                    </div>
                    <button class="add-cart">🛒 Thêm vào giỏ</button>
                    <button class="buy-now">🛍 Mua ngay</button>
                </div>

                <h4>Product Details</h4>
                <span>
                    Son tint lì Romand Juicy Lasting Tint là dòng son tint thuộc thương hiệu Romand
                    với bảng màu đa dạng từ màu nude nhẹ nhàng đến những tông đỏ gạch trầm cùng chất son sáng bóng,
                    trong trẻo tựa lớp đường kẹo hồ lô, màu son duy trì trong nhiều giờ liền cho bạn cảm giác bờ môi sáng bóng,
                    căng mọng và ngọt ngào.
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
            var MainImg = document.getElementById("MainImg");
            var smallimg = document.getElementsByClassName("smallimg");
            for (let i = 0; i < smallimg.length; i++) {
                smallimg[i].onclick = function() {
                    MainImg.src = smallimg[i].src;
                }
            }
        </script>

        <script>
            const minusBtn = document.querySelector(".minus");
            const plusBtn = document.querySelector(".plus");
            const qtyInput = document.getElementById("quantity");

            minusBtn.addEventListener("click", () => {
                let current = parseInt(qtyInput.value);
                if (current > 1) qtyInput.value = current - 1;
            });

            plusBtn.addEventListener("click", () => {
                let current = parseInt(qtyInput.value);
                qtyInput.value = current + 1;
            });
        </script>

        <?php include 'footer.php'; ?>
    </body>

    </html>
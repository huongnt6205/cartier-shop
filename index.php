<?php
@include 'config.php';
session_start();

$message = [];

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    // Có thể chuyển hướng tới trang login nếu muốn
    // header('Location: views/login.php');
    // exit();
}

$user_id = $_SESSION['user_id'] ?? null;
$user_name = $_SESSION['user_name'] ?? 'Khách';

// Xử lý khi thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart']) && $user_id) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_image = mysqli_real_escape_string($conn, $_POST['product_image']);
    $product_quantity = mysqli_real_escape_string($conn, $_POST['product_quantity']);

    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
    $check_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE pid = '$product_id' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart) > 0) {
        $message[] = 'Sản phẩm đã có trong giỏ hàng';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'Đã thêm sản phẩm vào giỏ hàng';
    }
}

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
    header('Location: admin/ad_page.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cartier Beauty.vn </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/index.css">
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
    <?php include __DIR__ . '/views/header.php'; ?>

    <section class="hero">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide" style="background-image: url('images/hero-bg.jpg');">
                    <div class="hero-bn">
                        <h4>Trade-in-offer</h4>
                        <h2>Super value deals</h2>
                        <h1>On all products</h1>
                        <p>Save more with coupons & up to 70% off!</p>
                        <button class="bthero">Shop Now</button>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide" style="background-image: url('images/banner1.jpg');"></div>

                <!-- Slide 3 -->
                <div class="swiper-slide" style="background-image: url('images/banner3.jpg');"></div>
            </div>
            <!-- Pagination (dấu chấm trượt) -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <script>
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            speed: 1000, // 1s chuyển slide
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            grabCursor: true,
            effect: 'slide',
        });
    </script>

    <script>
        let index = 0;
        const slider = document.querySelector('.slider');
        const totalSlides = document.querySelectorAll('.slide').length;

        setInterval(() => {
            index = (index + 1) % totalSlides;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }, 3000);
    </script>



    <section class="product-highlight">
        <div class="highlight-image">
            <img src="/cartier-shop/images/A3.jpg" alt="Miss Cartier">
        </div>
        <div class="highlight-content">
            <p class="category">Makeup Artists</p>
            <h2 class="title">Miss Cartier </h2>
            <a href="#" class="discover-link">Discover</a>
        </div>
    </section>

    <section class="product-highlight-right">
        <div class="highlight-content-right">
            <h2 class="title">Cartier </h2>
            <p class="category">Tại Việt Nam, Cartier là thương hiệu chuyên về mỹ phẩm có sức ảnh hưởng lớn được thành lập vào năm 2000. Được biết đến với các thiết kế tinh tế, sang trọng và đẳng cấp Cartier đã trở thành biểu tượng của phong cách và sự xa hoa dành cho giới thượng lưu trên thế giới.</p>
            <a href="#" class="discover-link-right">Tìm hiểu thêm</a>
        </div>
        <div class="highlight-image-right">
            <img src="/cartier-shop/images/A2.jpg" alt="Miss Cartier">
        </div>
    </section>

    <section class="double-banner">
        <div class="banner-item">
            <img src="/cartier-shop/images/A4.jpg" alt="Handbags" />
            <div class="banner-text">
                <h4>HANDBAGS</h4>
                <a href="#">EXPLORE</a>
            </div>
        </div>

        <div class="banner-item">
            <img src="/cartier-shop/images/A5.jpg" alt="Ready to Wear" />
            <div class="banner-text">
                <h4>READY TO WEAR</h4>
                <a href="#">VIEW MORE</a>
            </div>
        </div>
    </section>

    <section class="new-arrivals">
        <h2>New Arrivals</h2>
        <div class="tabs">
            <button class="tab " data-tab="fragrance">Fragrance</button>
            <button class="tab active" data-tab="makeup">Makeup</button>
            <button class="tab" data-tab="skincare">Skincare</button>
        </div>

        <div class="tab-content active" id="makeup">
            <div class="product-grid">
                <img src="/cartier-shop/images/B1.jpg" alt="Lipstick">
                <img src="/cartier-shop/images/B2.jpg" alt="Powder">
                <img src="/cartier-shop/images/B3.jpg" alt="Palette">
            </div>
        </div>
    </section>
    <?php include 'views/footer.php'; ?>
</body>

</html>
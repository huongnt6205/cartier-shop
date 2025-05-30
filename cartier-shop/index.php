<?php

// @include 'config.php';

// session_start();

// $user_id = $_SESSION['user_id'];

// if (!isset($user_id)) {
//     header('location:views/login.php');
// }

// Xử lý khi người dùng thêm sản phẩm vào giỏ hàng
// if (isset($_POST['add_to_cart'])) {

//     $product_id = $_POST['product_id'];
//     $product_name = $_POST['product_name'];
//     $product_price = $_POST['product_price'];
//     $product_image = $_POST['product_image'];
//     $product_quantity = $_POST['product_quantity'];

// Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
// $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

// if (mysqli_num_rows($check_cart_numbers) > 0) {
//     $message[] = 'Sản phẩm đã có trong giỏ hàng';
// } else {
//     // Thêm sản phẩm vào giỏ hàng
//     mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
//     $message[] = 'Đã thêm sản phẩm vào giỏ hàng';
// }
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cartier Beauty.vn </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/index.css">
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
    <?php include __DIR__ . '/views/header.php'; ?>

    <section class="hero">
        <div class="hero-bn">
            <h4>Trade-in-offer</h4>
            <h2>Super value deals</h2>
            <h1>On all products</h1>
            <p>Save more with coupons & up to 70% off! </p>
            <button class="bthero">Shop Now</button>
        </div>
    </section>

    <section class="sm-banner">
        <div class="banner-box">
            <h4>Deals Sốc</h4>
            <h2>MUA 1 TẶNG 1 MIỄN PHÍ</h2>
            <span>Trở thành phiên bản tốt hơn của chính mìnhmình.</span>
            <button>Tìm hiểu thêm</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>Mùa hè</h4>
            <h2>BỘ SƯU TẬP MỚI</h2>
            <span>Đánh thức vẻ đẹp bên trong của bạn!</span>
            <button>Bộ sưu tập</button>
        </div>
        <div class="info-text">
            <h2>CARTIER - THƯƠNG HIỆU HÀNG ĐẦU TẠI VIỆT NAM </h2>
            <p> Tại Việt Nam, Cartier là thương hiệu chuyên về mỹ phẩm có sức ảnh hưởng lớn, được thành lập năm 2000.
                Cartier được biết đến với các thiết kế tinh tế, sang trọng và đẳng cấp,
                trở thành biểu tượng của phong cách và sự xa hoa dành cho giới thượng lưu trên thế giới.
            </p>
        </div>
    </section>

    <section class="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Summer Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>UPCOMING COLLECTION</h2>
            <h3>Spring/Summer 2025</h3>
        </div>
        <div class="banner-box banner-box4">
            <h2>VARIETY OF COLORS</h2>
            <h3>New Trend</h3>
        </div>
    </section>

    <?php include 'views/footer.php'; ?>
</body>

</html>
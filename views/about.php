<?php
// Nếu bạn sử dụng hệ thống PHP MVC, đây có thể được bao gồm trong template/layout chính.
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Cartier Beauty</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/about.css">
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="page-header">
        <h2>#VềChúngTôi</h2>
        <p>Khám phá hành trình chăm sóc sắc đẹp cùng CARTIER BEAUTY – chất lượng và uy tín tạo nên sự khác biệt.</p>
    </section>

    <!-- tổng quan -->
    <section class="about-head">
        <img src="../images/about/abouthead1.jpg" alt="">
        <div>
            <h2>Tổng quan về <strong>CARTIER BEAUTY</strong></h2>
            <p>
                <strong>CARTIER BEAUTY</strong> là điểm đến lý tưởng dành cho những người yêu cái đẹp và mong muốn chăm
                sóc làn da bằng các sản phẩm chất lượng cao, an toàn và hiệu quả. Với sứ mệnh mang lại vẻ đẹp tự nhiên
                và sự tự tin cho mỗi khách hàng, chúng tôi luôn cập nhật những xu hướng mỹ phẩm mới nhất từ khắp nơi
                trên thế giới.
                Tại đây, bạn sẽ tìm thấy đa dạng các sản phẩm từ chăm sóc da, trang điểm đến chăm sóc cơ thể – tất cả
                đều được chọn lọc kỹ lưỡng từ các thương hiệu uy tín. <strong>CARTIER BEAUTY</strong> cam kết đồng hành
                cùng bạn trên hành trình tỏa sáng theo cách riêng của chính mình.
            </p>
            <marquee bgcolor="#f8e1ea" loop="-1" scrollamount="5" width="100%">
                Khám phá vẻ đẹp rạng rỡ của bạn cùng các sản phẩm chăm sóc da và trang điểm cao cấp từ CARTIER BEAUTY –
                Tự tin bắt đầu từ sự chăm sóc.
            </marquee>
        </div>
    </section>

    <!-- đội ngũ -->
    <section class="team-section">
        <h2>Đội ngũ sáng lập & nhân sự</h2>
        <div class="team-grid">
            <div class="team-member">
                <img src="../images/about/ceo.jpg" alt="Ngô Thị Hường- Nhà sáng lập & CEO" />
                <h3>Ngô Thị Hường</h3>
                <p>Nhà sáng lập & CEO</p>
            </div>
            <div class="team-member">
                <img src="../images/about/mk.jpg" alt="Nguyễn Hải Hưng Yên - Giám đốc Marketing" />
                <h3>Nguyễn Hải Hưng Yên</h3>
                <p>Giám đốc Marketing</p>
            </div>
            <div class="team-member">
                <img src="../images/about/cv.jpg" alt="Lê Hương - Chuyên viên chăm sóc khách hàng" />
                <h3>Lê Hương</h3>
                <p>Chuyên viên chăm sóc khách hàng</p>
            </div>
            <div class="team-member">
                <img src="../images/about/ql.jpg" alt="Phạm An - Quản lý kho hàng" />
                <h3>Phạm An</h3>
                <p>Quản lý kho hàng</p>
            </div>
        </div>
    </section>

    <!-- video và hình ảnh cách mua hàng -->
    <section class="order-process-section">
        <div class="container order-process">
            <h1>Quy trình đặt hàng</h1>

            <div class="huongdan">
                <h2>Hướng dẫn đặt hàng</h2>
                <ol>
                    <li>1. Đăng nhập bằng tài khoản</li>
                    <li>2. Chọn sản phẩm vào giỏ hàng</li>
                    <li>3. Nhập mã ưu đãi (nếu có)</li>
                    <li>4. Chọn hình thức thanh toán và giao hàng</li>
                    <li>5. Tiến hành thanh toán</li>
                    <li>6. Đặt hàng thành công</li>
                    <li>7. Kiểm tra trạng thái đơn hàng trên website hoặc email đã đăng ký</li>
                </ol>
            </div>

            <div class="quytrinh">
                <div class="step">
                    <img src="../images/about/login.png" alt="Đăng nhập">
                    <p><strong>01. Đăng nhập</strong></p>
                </div>
                <div class="step">
                    <img src="../images/about/cart.png" alt="Giỏ hàng">
                    <p><strong>02. Chọn sản phẩm</strong></p>
                </div>
                <div class="step">
                    <img src="../images/about/voucher.png" alt="Mã ưu đãi">
                    <p><strong>03. Mã ưu đãi</strong></p>
                </div>
                <div class="step">
                    <img src="../images/about/buying.png" alt="Đặt hàng">
                    <p><strong>04. Đặt hàng</strong></p>
                </div>
                <div class="step">
                    <img src="../images/about/payment.png" alt="Thanh toán">
                    <p><strong>05. Thanh toán</strong></p>
                </div>
                <div class="step">
                    <img src="../images/about/ship.png" alt="Giao hàng">
                    <p><strong>06. Giao hàng</strong></p>
                </div>
            </div>
        </div>
        <div class="video">
            <h2>Sản phẩm của chúng tôi</h2>
            <video autoplay muted loop src="../images/about/videopr.mp4"></video>
        </div>
    </section>

    <!-- cam kết -->
    <section class="camket">
        <div class="commitment">
            <h2>CARTIER BEAUTY</h2>
            <div class="commitment-list">
                <div class="commit-item">
                    <img src="../images/star.png" alt="Chất lượng cao">
                    <h3>Chất lượng hàng đầu</h3>
                    <p>Tất cả sản phẩm đều được kiểm định kỹ càng, đến từ thương hiệu uy tín và an toàn cho làn da.</p>
                </div>
                <div class="commit-item">
                    <img src="../images/ch.png" alt="Hàng chính hãng">
                    <h3>100% chính hãng</h3>
                    <p>Cam kết hàng hóa chính hãng, hoàn tiền 200% nếu phát hiện hàng giả, hàng nhái.</p>
                </div>
                <div class="commit-item">
                    <img src="../images/ht.png" alt="Hỗ trợ 24/7">
                    <h3>Hỗ trợ tận tâm</h3>
                    <p>Đội ngũ tư vấn viên sẵn sàng hỗ trợ bạn 24/7 với mọi vấn đề về sản phẩm và đơn hàng.</p>
                </div>
                <div class="commit-item">
                    <img src="../images/gh.png" alt="Giao hàng nhanh">
                    <h3>Giao hàng toàn quốc</h3>
                    <p>Giao hàng nhanh chóng từ 1–3 ngày, miễn phí vận chuyển cho đơn hàng từ 500.000đ.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

</body>

</html>
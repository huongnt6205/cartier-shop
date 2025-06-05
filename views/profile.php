<?php
require_once __DIR__ . '/../config/dbconfig.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$conn = connectDatabase();
$userId = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT name, email, user_type FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Không tìm thấy người dùng.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="/cartier-shop/css/app.css">
    <link rel="stylesheet" href="/cartier-shop/css/profile.css">
    <link rel="stylesheet" href="/cartier-shop/css/header.css">
    <link rel="stylesheet" href="/cartier-shop/css/footer.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="profile-section">
        <div class="profile-container">
            <div class="profile-header">
                <h2>Xin chào <?= htmlspecialchars($user['name']) ?>!</h2>
                <p> <i class="fa-solid fa-envelope"> </i> Email đăng ký: <?= htmlspecialchars($user['email']) ?></p>
            </div>

            <div class="profile-info">
                <p><i class="fa-solid fa-user-tag"></i> Loại tài khoản: <?= $user['user_type'] === 'admin' ? 'Quản trị viên' : 'Người dùng' ?></p>
                <p><i class="fa-solid fa-calendar-day"></i> Ngày tham gia: <?= date("d/m/Y", strtotime($user['created_at'] ?? 'today')) ?></p>
            </div>

            <div class="btn-group">
                <a href="orders.php"><i class="fa-solid fa-box"></i> Xem đơn hàng</a>
            </div>
        </div>
    </section>


    <?php include 'footer.php'; ?>
</body>

</html>
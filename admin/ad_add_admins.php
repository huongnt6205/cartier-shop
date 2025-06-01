<?php
require_once __DIR__ . '/../service/users_service.php';

$name = '';
$email = '';
$password = '';
$confirm_password = '';
$errors = [];
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validate dữ liệu
    if ($name === '') {
        $errors[] = "Tên không được để trống.";
    }

    if ($email === '') {
        $errors[] = "Email không được để trống.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ.";
    } elseif (getUserByEmail($email)) {
        $errors[] = "Email đã tồn tại trong hệ thống.";
    }

    if ($password === '') {
        $errors[] = "Mật khẩu không được để trống.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Mật khẩu xác nhận không khớp.";
    }

    // Nếu không lỗi thì lưu admin mới
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $newAdmin = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'user_type' => 'admin',
        ];

        $inserted = addUser($newAdmin);
        if ($inserted) {
            $successMessage = "Thêm quản trị viên mới thành công!";
            // Xóa dữ liệu form sau khi thêm thành công
            $name = $email = $password = $confirm_password = '';
        } else {
            $errors[] = "Có lỗi xảy ra khi thêm quản trị viên.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm Quản trị viên mới</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css">
    <link rel="stylesheet" href="../admin/css/ad_add_admins.css">
    <link rel="stylesheet" href="../admin/css/ad_header.css">
    <link rel="stylesheet" href="../admin/css/ad_footer.css">
</head>

<body>

    <?php include 'ad_header.php'; ?>

    <section class="admin-management">
        <h1>Thêm Quản trị viên mới</h1>

        <?php if (!empty($errors)): ?>
            <div style="color: red; margin-bottom: 10px;">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($successMessage): ?>
            <div style="color: green; font-weight: bold; margin-bottom: 10px;">
                <?= htmlspecialchars($successMessage) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="ad_add_admins.php">
            <div>
                <label for="name">Tên:</label><br>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
            </div>

            <div>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
            </div>

            <div>
                <label for="password">Mật khẩu:</label><br>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <label for="confirm_password">Xác nhận mật khẩu:</label><br>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit">Thêm Quản trị viên</button>
        </form>

        <p><a href="ad_admins.php">← Quay lại danh sách quản trị viên</a></p>
    </section>

    <?php include 'ad_footer.php'; ?>

</body>

</html>

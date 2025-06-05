<?php
require_once __DIR__ . '/../service/users_service.php';

$message = '';
$errors = [];

if (!isset($_GET['id'])) {
    header('Location: ad_users.php');
    exit;
}

$userId = intval($_GET['id']);

// Lấy thông tin user để hiển thị form
$user = getUserById($userId);

if (!$user) {
    $message = "Người dùng không tồn tại.";
}

// Xử lý form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $user_type = $_POST['user_type'] ?? 'user';  // Có thể giới hạn chỉ 'user' hoặc 'admin'

    // Validate
    if ($name === '') {
        $errors[] = 'Tên không được để trống.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email không hợp lệ.';
    }
    if ($user_type !== 'admin' && $user_type !== 'user') {
        $errors[] = 'Loại người dùng không hợp lệ.';
    }

    if (empty($errors)) {
        // Cập nhật user trong CSDL
        if (updateUser($userId, $name, $email, $user_type)) {
            $message = "Cập nhật thông tin người dùng thành công.";
            // Cập nhật lại biến user để hiển thị
            $user = getUserById($userId);
        } else {
            $errors[] = "Cập nhật người dùng thất bại.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../admin/css/ad_app.css" />
    <link rel="stylesheet" href="../admin/css/ad_edit_users.css" />
    <link rel="stylesheet" href="../admin/css/ad_footer.css" />
    <link rel="stylesheet" href="../admin/css/ad_header.css" />
    <title>Sửa Người dùng</title>
</head>

<body>
    <?php include 'ad_header.php'; ?>

    <section class="edit-users">


        <h1>Sửa Người dùng</h1>

        <?php if ($message): ?>
            <p style="color: green;"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <ul style="color: red;">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if ($user): ?>
            <form method="post" action="">
                <label>Tên:<br />
                    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" />
                </label><br /><br />

                <label>Email:<br />
                    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" />
                </label><br /><br />

                <label>Loại người dùng:<br />
                    <select name="user_type">
                        <option value="user" <?= $user['user_type'] === 'user' ? 'selected' : '' ?>>User</option>
                        <option value="admin" <?= $user['user_type'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                </label><br /><br />

                <button type="submit">Cập nhật</button>
                <a href="ad_users.php"> ← Quay lại</a>
            </form>
        <?php else: ?>
            <p>Người dùng không tồn tại.</p>
            <a href="ad_users.php"> ← Quay lại</a>
        <?php endif; ?>
    </section>

    <?php include 'ad_footer.php'; ?>
</body>

</html>
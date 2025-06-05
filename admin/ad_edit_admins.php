<?php
require_once __DIR__ . '/../service/users_service.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Thiếu ID quản trị viên.";
    exit;
}

$admin = getUserById($id);
if (!$admin || $admin['user_type'] !== 'admin') {
    echo "Không tìm thấy quản trị viên.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updated = updateUserWithPassword($id, $name, $email, $hashedPassword);
    } else {
        $updated = updateUser($id, $name, $email);
    }

    if ($updated) {
        header("Location: ad_admins.php?msg=updated");
        exit;
    } else {
        $error = "Cập nhật thất bại.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa quản trị viên</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css">
    <link rel="stylesheet" href="../admin/css/ad_edit_admins.css">
    <link rel="stylesheet" href="../admin/css/ad_header.css">
    <link rel="stylesheet" href="../admin/css/ad_footer.css">
</head>

<body>
    <?php include 'ad_header.php'; ?>

    <section class="edit_form">
        <h2>Sửa thông tin quản trị viên</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post">
            <label>Tên:</label><br>
            <input type="text" name="name" value="<?= htmlspecialchars($admin['name']) ?>"><br><br>

            <label>Email:</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($admin['email']) ?>"><br><br>

            <label>Mật khẩu mới (để trống nếu không đổi):</label><br>
            <input type="password" name="password"><br><br>

            <button type="submit">Cập nhật</button>
        </form>
    </section>

    <?php include 'ad_footer.php'; ?>
</body>

</html>
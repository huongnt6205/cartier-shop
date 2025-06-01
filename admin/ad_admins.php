<!-- trang quản trị viên -->

<?php
require_once __DIR__ . '/../service/users_service.php';

// Lấy danh sách admin (user_type = 'admin')
$admins = getUsersByType('admin');

// Xử lý xóa nếu có `id` trên URL
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    if (deleteUserById($id)) {
        $successMessage = "Đã xóa quản trị viên thành công.";
    } else {
        $errorMessage = "Không thể xóa quản trị viên.";
    }
}

// Lấy danh sách admin (user_type = 'admin')
$admins = getUsersByType('admin');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Quản trị viên</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css">
    <link rel="stylesheet" href="../admin/css/ad_admins.css">
    <link rel="stylesheet" href="../admin/css/ad_footer.css">
    <link rel="stylesheet" href="../admin/css/ad_header.css">
</head>

<body>

    <?php include 'ad_header.php'; ?>

    <section class="admin-management">
        <h1>Quản lý Quản trị viên</h1>
        <a class="btn-add" href="ad_add_admins.php">Thêm quản trị viên mới</a>
        <?php if (isset($successMessage)): ?>
            <div style="color: green; font-weight: bold; margin-bottom: 10px;">
                <?= $successMessage ?>
            </div>
        <?php endif; ?>

        <?php if (isset($errorMessage)): ?>
            <div style="color: red; font-weight: bold; margin-bottom: 10px;">
                <?= $errorMessage ?>
            </div>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Loại người dùng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($admins)): ?>
                    <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td><?= htmlspecialchars($admin['id']) ?></td>
                            <td><?= htmlspecialchars($admin['name']) ?></td>
                            <td><?= htmlspecialchars($admin['email']) ?></td>
                            <td><?= htmlspecialchars($admin['user_type']) ?></td>
                            <td class="actions">
                                <a href="ad_edit_admins.php?id=<?= urlencode($admin['id']) ?>">Sửa</a>

                                <a href="ad_admins.php?delete_id=<?= urlencode($admin['id']) ?>" onclick="return confirm('Bạn có chắc muốn xóa quản trị viên này?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">Không có quản trị viên nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <?php include 'ad_footer.php'; ?>

</body>

</html>
<?php
require_once __DIR__ . '/../service/users_service.php';

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
        <a class="btn-add" href="add_admin.php">Thêm quản trị viên mới</a>

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
                                <a href="view_admin.php?id=<?= urlencode($admin['id']) ?>">Xem</a>
                                <a href="edit_admin.php?id=<?= urlencode($admin['id']) ?>">Sửa</a>
                                <a href="delete_admin.php?id=<?= urlencode($admin['id']) ?>" onclick="return confirm('Bạn có chắc muốn xóa quản trị viên này?');">Xóa</a>
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
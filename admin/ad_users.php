<?php
require_once __DIR__ . '/../service/users_service.php';

// Lấy danh sách user (user_type = 'user')
$users = getUsersByType('user');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css" />
    <link rel="stylesheet" href="../admin/css/ad_users.css">
    <link rel="stylesheet" href="../admin/css/ad_footer.css" />
    <link rel="stylesheet" href="../admin/css/ad_header.css" />
    <title>Quản lý Người dùng</title>
</head>

<body>

    <?php include 'ad_header.php' ?>
    <section class="user-management">
        <h1>Quản lý Người dùng</h1>
        <a class="btn-add" href="add_user.php">Thêm người dùng mới</a>
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
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['user_type']) ?></td>
                            <td class="actions">
                                <a href="view_user.php?id=<?= urlencode($user['id']) ?>">Xem</a>
                                <a href="edit_user.php?id=<?= urlencode($user['id']) ?>">Sửa</a>
                                <a href="delete_user.php?id=<?= urlencode($user['id']) ?>" onclick="return confirm('Bạn có chắc muốn xóa người dùng này?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">Không có người dùng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <?php include 'ad_footer.php' ?>
</body>

</html>
<?php
require_once __DIR__ . '/../service/users_service.php';

// Biến lưu thông báo
$message = '';

// Xử lý xóa người dùng nếu có delete_id trong URL
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    if (deleteUserById($deleteId)) {
        $message = "Đã xóa người dùng có ID $deleteId thành công.";
    } else {
        $message = "Xóa người dùng thất bại.";
    }
}

// Lấy danh sách user (user_type = 'user') sau khi xóa
$users = getUsersByType('user');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Quản lý Người dùng</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css" />
    <link rel="stylesheet" href="../admin/css/ad_users.css" />
    <link rel="stylesheet" href="../admin/css/ad_footer.css" />
    <link rel="stylesheet" href="../admin/css/ad_header.css" />
</head>

<body>
    <?php include 'ad_header.php'; ?>

    <section class="user-management">
        <h1>Quản lý Người dùng</h1>

        <!-- Hiển thị thông báo -->
        <?php if ($message): ?>
            <div class="message" style="margin-bottom: 15px; font-weight: bold; color: green;">
                <?= htmlspecialchars($message) ?>
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
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['user_type']) ?></td>
                            <td class="actions">
                                <a href="ad_edit_users.php?id=<?= urlencode($user['id']) ?>">Sửa</a>
                                <a href="?delete_id=<?= urlencode($user['id']) ?>"
                                    onclick="return confirm('Bạn có chắc muốn xóa người dùng này?');">
                                    Xóa
                                </a>
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

    <?php include 'ad_footer.php'; ?>
</body>

</html>
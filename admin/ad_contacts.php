<!-- trang tin nhắn của khách hàng -->

<?php
require_once __DIR__ . '/../service/contacts_service.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteMessageById($id);
}

$messages = getAllMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý liên hệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../admin/css/ad_contacts.css">
    <link rel="stylesheet" href="../admin/css/ad_app.css" />
    <link rel="stylesheet" href="../admin/css/ad_footer.css" />
    <link rel="stylesheet" href="../admin/css/ad_header.css" />
</head>

<body>
    <?php include 'ad_header.php'?>
    <section class="section-contacts">
        <h1>Danh sách tin nhắn từ người dùng</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>Mã đơn hàng</th>
                    <th>Nội dung</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($messages)): ?>
                    <?php foreach ($messages as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['phone']) ?></td>
                            <td><?= $row['order_id'] ?></td>
                            <td><?= htmlspecialchars($row['message']) ?></td>
                            <td>
                                <a href="?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Bạn có chắc muốn xóa tin nhắn này?')">
                                    <i class="fas fa-trash"></i> Xoá
                                </a>
                                <a href="reply_message.php?id=<?= $row['id'] ?>" class="reply-btn">
                                    <i class="fas fa-reply"></i> Trả lời
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">Không có tin nhắn nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <?php include 'ad_footer.php' ?>
</body>

</html>
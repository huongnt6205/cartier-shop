
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý liên hệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/cartier-shop/admin/css/ad_contacts.css">
</head>

<body>

    <?php @include 'admin_header.php'; ?>

    <h1>Danh sách tin nhắn từ người dùng</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>SĐT</th>
            <th>Mã đơn hàng</th>
            <th>Nội dung</th>
            <th>Thao tác</th>
        </tr>

        <?php
        $query = mysqli_query($conn, "SELECT * FROM message ORDER BY id DESC") or die('Query thất bại!');
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo '
            <tr>
                <td>' . $row['id'] . '</td>
                <td>' . htmlspecialchars($row['name']) . '</td>
                <td>' . htmlspecialchars($row['phone']) . '</td>
                <td>' . $row['order_id'] . '</td>
                <td>' . htmlspecialchars($row['message']) . '</td>
                <td>
                    <a href="?delete=' . $row['id'] . '" class="delete-btn" onclick="return confirm(\'Bạn có chắc muốn xóa tin nhắn này?\')">
                        <i class="fas fa-trash"></i> Xoá
                    </a>
                </td>
            </tr>';
            }
        } else {
            echo '<tr><td colspan="6" style="text-align:center;">Không có tin nhắn nào.</td></tr>';
        }
        ?>
    </table>

</body>

</html>
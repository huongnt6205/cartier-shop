    <!-- trả lời tin nhắn khách hàng -->
    
    <?php
    require_once __DIR__ . '/../service/contacts_service.php';

    if (!isset($_GET['id'])) {
        header('Location: ad_contacts.php'); // chuyển về trang danh sách nếu không có id
        exit;
    }

    $id = $_GET['id'];
    $message = getMessageById($id); // Lấy tin nhắn theo ID

    if (!$message) {
        echo "Tin nhắn không tồn tại!";
        exit;
    }

    $replySent = false;
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $replyContent = trim($_POST['reply_message']);

        if (empty($replyContent)) {
            $error = "Nội dung trả lời không được để trống.";
        } else {
            // Bạn có thể xử lý gửi email/SMS hoặc lưu vào CSDL ở đây
            // sendReplyToUser($message['phone'], $replyContent);
            // saveReplyMessage($id, $replyContent);

            $replySent = true;
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Trả lời tin nhắn</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
        <link rel="stylesheet" href="/cartier-shop/admin/css/reply_message.css" />
    </head>

    <body>
        <section class="section-reply">
            <h1>Trả lời tin nhắn từ: <?= htmlspecialchars($message['name']) ?></h1>

            <div class="original-message">
                <h3>Nội dung tin nhắn gốc:</h3>
                <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
                <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($message['phone']) ?></p>
                <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($message['order_id']) ?></p>
            </div>

            <?php if ($replySent): ?>
                <div class="success-message">Đã gửi trả lời thành công!</div>
                <a href="ad_contacts.php">Quay lại danh sách tin nhắn</a>
            <?php else: ?>
                <?php if ($error): ?>
                    <div class="error-message"><?= $error ?></div>
                <?php endif; ?>

                <form method="POST">
                    <label for="reply_message">Nội dung trả lời:</label><br />
                    <textarea name="reply_message" id="reply_message" rows="5" cols="50" required></textarea><br />
                    <button type="submit">Gửi trả lời</button>
                    <a href="contacts_list.php" class="cancel-btn">Hủy</a>
                </form>
            <?php endif; ?>
        </section>

        </style>
    </body>

    </html>
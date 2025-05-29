<?php
@include 'config/dbconfig.php';  // Đảm bảo đường dẫn đúng
session_start();

$message = [];

if (isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Kiểm tra dữ liệu
    if (empty($name)) {
        $message[] = "Vui lòng nhập tên.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message[] = "Email không hợp lệ.";
    }

    if (strlen($password) < 6) {
        $message[] = "Mật khẩu phải có ít nhất 6 ký tự.";
    }

    if ($password !== $confirm_password) {
        $message[] = "Mật khẩu xác nhận không khớp.";
    }

    if (empty($message)) {
        // Kiểm tra email đã tồn tại chưa
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $message[] = "Email này đã được đăng ký.";
        } else {
            // Lưu mật khẩu THÔ (không hash)
            $stmt_insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt_insert->bind_param("sss", $name, $email, $password);

            if ($stmt_insert->execute()) {
                header('Location: login.php?register=success');
                exit();
            } else {
                $message[] = "Lỗi khi đăng ký, vui lòng thử lại.";
            }

            $stmt_insert->close();
        }
        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Đăng ký</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link rel="stylesheet" href="../css/signup.css" />
</head>

<body>
  <div class="container">
    <div class="left"></div>
    <div class="right">
      <h2>Đăng ký</h2>

      <?php
      if (!empty($message)) {
        foreach ($message as $msg) {
          echo '<p style="color:red;">' . htmlspecialchars($msg) . '</p>';
        }
      }
      ?>

      <form action="" method="POST">
        <input
          type="text"
          name="name"
          placeholder="Tên đăng ký"
          required
          value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" />
        <input
          type="email"
          name="email"
          placeholder="Email"
          required
          value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" />
        <input
          type="password"
          name="password"
          placeholder="Mật khẩu"
          required />
        <input
          type="password"
          name="confirm_password"
          placeholder="Xác nhận mật khẩu"
          required />
        <button type="submit" name="submit">Đăng ký</button>
      </form>

      <p class="social-text">Đăng ký nhanh với tài khoản mạng xã hội của bạn</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
      </div>
    </div>
  </div>
</body>

</html>
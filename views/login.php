<?php
@include 'config/dbconfig.php';
session_start();

$message = [];

if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $email = mysqli_real_escape_string($conn, $email);
    $password_input = mysqli_real_escape_string($conn, $_POST['password']);

    // Truy vấn theo email và mật khẩu thô (không hash)
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password_input'";
    $result = mysqli_query($conn, $query) or die('Query failed');   

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_type'] = $row['user_type'];

        if ($row['user_type'] == 'admin') {
            header('Location: ../admin/ad_page.php');
        } else {
            header('Location: ../index.php');
        }
        exit();
    } else {
        $message[] = 'Email hoặc mật khẩu không đúng!';
    }
}
?>



<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <?php
    if (!empty($message)) {
        foreach ($message as $msg) {
            echo '<div class="message"><span>' . htmlspecialchars($msg) . '</span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>';
        }
    }
    ?>

    <section class="login-container">
        <div class="login-left">
            <img src="../images/Signup.jpg" alt="Ảnh minh họa">
        </div>
        <div class="login-right">
            <div class="login-form-box">
                <h2>Đăng nhập</h2>
                <p>Bạn chưa có tài khoản? <a href="signup.php">Đăng ký</a></p>
                <form class="form" action="" method="POST">
                    <!-- Email lên trước -->
                    <div class="form-group">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required />
                    </div>

                    <!-- Username để sau (nếu muốn giữ lại) -->
                    <div class="form-group">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" placeholder="Tên đăng nhập" />
                    </div>

                    <div class="form-group">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Mật khẩu" required />
                    </div>

                    <div class="remember-row">
                        <label><input type="checkbox" /> Nhớ mật khẩu</label>
                        <a href="#">Quên mật khẩu?</a>
                    </div>

                    <button class="btn-login" type="submit" name="submit">
                        Đăng nhập <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

</body>

</html>
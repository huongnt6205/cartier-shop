    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link rel="stylesheet" href="/cartier-shop/css/css/login.css">
    </head>

    <body>

        <section class="login-container">
            <div class="login-left">
                <img src="../images/Signup.jpg" alt="Ảnh minh họa">
            </div>
            <div class="login-right">
                <div class="login-form-box">
                    <h2>Đăng nhập</h2>
                    <p>
                        Bạn chưa có tài khoản?
                        <a href="#">Đăng ký</a>
                    </p>
                    <form class="form" action="#" method="POST">
                        <div class="form-group">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="username" placeholder="Tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" placeholder="Mật khẩu">
                        </div>
                        <div class="remember-row">
                            <label>
                                <input type="checkbox"> Nhớ mật khẩu
                            </label>
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                        <button class="btn-login" type="submit">Đăng nhập <i class="fa-solid fa-arrow-right"></i></button>
                        <div class="alt-login">
                            <a href="#" class="email-login">Đăng nhập với Email</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>

    </html>
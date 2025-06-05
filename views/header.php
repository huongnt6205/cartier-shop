<?php
require __DIR__ . "/../service/category_service.php";

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$categories = getAllCategory();
?>

<header>
  <nav class="header-nav">
    <div class="nav-left">
      <ul>
        <li>
          <a href="/cartier-shop/index.php">
            <img style="width: 100px;" src="/cartier-shop/images/logo-beauty.jpg" alt="Logo Cartier Mỹ phẩm chính hãng" />
          </a>
        </li>

        <li class="dropdown">
          <a href="/cartier-shop/views/shop.php">SẢN PHẨM <i class="fa fa-caret-down"></i></a>
          <ul class="dropdown-content">
            <?php
            foreach ($categories as $category) {
              if (isset($category['name'])) {
                echo '<li><a href="/cartier-shop/views/shop.php#' . $category['id'] . '">' . $category['name'] . '</a></li>';
              }
            }
            ?>
          </ul>
        </li>

        <li class="dropdown">
          <a href="/cartier-shop/views/sale.php">KHUYẾN MÃI <i class="fa fa-caret-down"></i></a>
          <ul class="dropdown-content">
            <?php
            foreach ($categories as $category) {
              if (isset($category['name'])) {
                echo '<li><a href="/cartier-shop/views/sale.php#' . $category['id'] . '">' . $category['name'] . '</a></li>';
              }
            }
            ?>
          </ul>
        </li>

        <li><a href="/cartier-shop/views/about.php">ĐỘC QUYỀN CARTIER</a></li>
      </ul>
    </div>

    <div class="nav-right">
      <form action="/cartier-shop/views/search_page.php" method="get" class="search-form">
        <input class="input-text" type="text" name="keyword" placeholder="Nhập tên sản phẩm"
          value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
        <button type="submit"><i class="fas fa-search"></i></button>
      </form>

      <!-- Thông báo kết quả và nút làm mới -->
      <?php if (isset($_GET['keyword']) && trim($_GET['keyword']) !== ''): ?>
        <form method="get" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
          <button type="submit"> <a href="/cartier-shop/views/shop.php"> Thoát tìm kiếm </a> </button>
        </form>
      <?php endif; ?>

      <?php if (isset($_SESSION['user_id'])): ?>
        <div class="user-dropdown">
          <i class="fa-solid fa-user user-icon" onclick="toggleUserMenu()"></i>
          <ul class="user-menu" id="user-menu">
            <li>Xin chào<strong> <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</strong></li>
            <li><a href="/cartier-shop/views/profile.php">Thông tin cá nhân</a></li>
            <li><a href="/cartier-shop/views/contact.php">Liên hệ</a></li>
            <li><a href="/cartier-shop/views/orders.php">Đơn hàng</a></li>
            <li><a href="/cartier-shop/views/logout.php">Đăng xuất</a></li>
          </ul>
        </div>
      <?php else: ?>
        <a href="/cartier-shop/views/login.php">
          <button>ĐĂNG NHẬP</button>
        </a>
      <?php endif; ?>

      <span class="span-icon-cart">
        <a href="/cartier-shop/views/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        <span id="cart-item-number">

          <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
        </span>
      </span>
    </div>
  </nav>
</header>
<script>
  function toggleUserMenu() {
    const menu = document.getElementById('user-menu');
    menu.classList.toggle('show');
  }
</script>
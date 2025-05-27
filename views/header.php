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
                if(isset($category['name'])) {
                  echo '<li><a href="/cartier-shop/views/shop.php#' . $category['id'] . '">' . $category['name'] . '</a></li>';
                }
              }
            ?>
          </ul>
        </li>

        <li><a href="/cartier-shop/views/sale.php">KHUYẾN MÃI</a></li>
        <li><a href="/cartier-shop/views/about.php">Thông Tin</a></li>
        <li><a href="/cartier-shop/views/contact.php">LIÊN HỆ</a></li>
      </ul>
    </div>

    <div class="nav-right">
      <form class="search-form" action="/cartier-shop/views/shop.php" method="GET">
        <input type="text" name="search" placeholder="Search..." />
        <button type="submit"><i class="fas fa-search"></i></button>
      </form>

      <?php if (isset($_SESSION['user_id'])): ?>
        <span>Xin chào, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
        <a href="/cartier-shop/views/logout.php" style="margin-left: 15px; padding: 8px 12px; background-color: #f44336; color: white; border-radius: 3px; text-decoration: none;">ĐĂNG XUẤT</a>
      <?php else: ?>
        <a href="/cartier-shop/views/login.php">
          <button>ĐĂNG NHẬP</button>
        </a>
      <?php endif; ?>

      <span class="span-icon-cart">
        <a href="/cartier-shop/views/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        <span id="cart-item-number">
          <?=count($_SESSION['cart'])?>
        </span>
      </span>
    </div>
  </nav>
</header>
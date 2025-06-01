<!-- trang header -->
<?php
session_start();

if (!isset($_SESSION['admin_name'])) {
   $_SESSION['admin_name'] = "ADMIN";
}
?>


<header>
   <nav class="header-nav">
      <div class="nav-left">
         <ul>
            <li>
               <a href="/cartier-shop/admin/ad_page.php">
                  <img style="width: 100px;" src="/cartier-shop/images/logo-beauty.jpg" alt="Admin Logo" />
               </a>
            </li>
            <li><a href="/cartier-shop/admin/ad_admins.php">  Quản lí admin</a> </li>
            <li><a href="/cartier-shop/admin/ad_shops.php"> Quản lí sản phẩm </a></li>
            <li><a href="/cartier-shop/admin/ad_contacts.php"> Quản lí liên hệ </a></li>
         </ul>
      </div>

      <div class="nav-right">
         <?php if (!empty($_SESSION['admin_name'])): ?>
            <span>Xin chào, <strong><?= htmlspecialchars($_SESSION['admin_name']) ?></strong></span>
            <a href="/cartier-shop/views/logout.php" style="margin-left: 15px; padding: 8px 12px; background-color: #d63384; color: white; border-radius: 3px; text-decoration: none;">ĐĂNG XUẤT</a>
         <?php else: ?>
            <a href="/cartier-shop/views/login.php">
               <button style="padding: 8px 12px; background-color: #f44336; color: white; border: none; border-radius: 3px;">ĐĂNG NHẬP</button>
            </a>
         <?php endif; ?>
      </div>
   </nav>
</header>
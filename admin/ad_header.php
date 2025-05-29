   <header>
      <nav class="header-nav">
         <div class="nav-left">
            <ul>
               <li>
                  <a href="/cartier-shop/admin/dashboard.php">
                     <img style="width: 100px;" src="/cartier-shop/images/logo-beauty.jpg" alt="Admin Logo" />
                  </a>
               </li>

               <li><a href="/cartier-shop/admin/add_product.php">Thêm sản phẩm</a></li>
               <li><a href="/cartier-shop/admin/add_product_detail.php">Thêm chi tiết sản phẩm</a></li>
               <li><a href="/cartier-shop/admin/update_product.php">Cập nhật sản phẩm</a></li>
               <li><a href="/cartier-shop/admin/contact.php">Liên hệ</a></li>
            </ul>
         </div>

         <div class="nav-right">
            <?php if (isset($_SESSION['admin_name'])): ?>
               <span>Xin chào, <?php echo htmlspecialchars($_SESSION['admin_name']); ?></span>
               <a href="/cartier-shop/views/logout.php" style="margin-left: 15px; padding: 8px 12px; background-color: #f44336; color: white; border-radius: 3px; text-decoration: none;">ĐĂNG XUẤT</a>
            <?php else: ?>
               <a href="/cartier-shop/views/login.php">
                  <button>ĐĂNG NHẬP</button>
               </a>
            <?php endif; ?>
         </div>
      </nav>
   </header>
-- Bảng người dùng
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  user_type VARCHAR(20) NOT NULL DEFAULT 'user'
);

-- Bảng sản phẩm mỹ phẩm
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  category VARCHAR(50),
  brand VARCHAR(50),
  image VARCHAR(100)
);

-- Bảng giỏ hàng
CREATE TABLE cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  added_on DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Bảng đơn hàng
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  total_price DECIMAL(10,2) NOT NULL,
  order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  payment_method VARCHAR(50),
  address TEXT,
  payment_status VARCHAR(20) DEFAULT 'pending',
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Bảng chi tiết đơn hàng
CREATE TABLE order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Bảng sản phẩm khuyến mãi
CREATE TABLE discount_products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT NOT NULL,
  original_price DECIMAL(10,2) NOT NULL,
  discount_price DECIMAL(10,2) NOT NULL,
  start_date DATE,
  end_date DATE,
  FOREIGN KEY (product_id) REFERENCES products(id)
);


CREATE TABLE reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,  
  user_id INT NOT NULL,               
  product_id INT NOT NULL,            
  rating INT CHECK(rating BETWEEN 1 AND 5),
  comment TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);


-- Bảng tin nhắn (liên hệ)
CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20),
  message TEXT,
  sent_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);


-- Bảng users (người dùng)
INSERT INTO users (name, email, password, user_type) VALUES
('huong', 'huongnt06022005@gmail.com', 'huong123', 'admin'),
('yên', 'hungyenn044@gmail.com', 'yen123', 'admin'),
('user1', 'abc123447@gmail.com', '123456', 'user'),
('user2', 'mnq778625@gmail.com', '123456', 'user');

INSERT INTO products (name, description, price, category, brand, image) VALUES
('cushion', 'Cushion Dior giúp làm đều màu da, sáng da và chống lão hóa', 450000.00, 'cushion', 'Dior', 'dr1.jpg'),
('Kem chống nắng', 'Kem chống nắng SPF50 bảo vệ da', 300000.00, 'Kem chống nắng', 'Brand B', 'kemchongnang.jpg'),
('Son môi đỏ', 'Son môi đỏ lì, bền màu', 250000.00, 'Son môi', 'Brand C', 'sonmoi.jpg');

-- Bảng cart (giỏ hàng)
INSERT INTO cart (user_id, product_id, quantity) VALUES
(2, 1, 2),
(3, 3, 1);

-- Bảng orders (đơn hàng)
INSERT INTO orders (user_id, total_price, payment_method, address, payment_status) VALUES
(2, 900000.00, 'Credit Card', '123 Đường ABC, Quận 1, TP.HCM', 'pending'),
(3, 250000.00, 'Paypal', '456 Đường XYZ, Quận 3, TP.HCM', 'completed');

-- Bảng order_items (chi tiết đơn hàng)
INSERT INTO order_items (order_id, product_id, quantity, price) VALUES
(1, 1, 2, 450000.00),
(2, 3, 1, 250000.00);

-- Bảng discount_products (sản phẩm khuyến mãi)
INSERT INTO discount_products (product_id, original_price, discount_price, start_date, end_date) VALUES
(1, 450000.00, 400000.00, '2025-05-01', '2025-05-31'),
(3, 250000.00, 200000.00, '2025-05-15', '2025-06-15');

-- Bảng reviews (đánh giá sản phẩm)
INSERT INTO reviews (user_id, product_id, rating, comment) VALUES
(2, 1, 5, 'Sản phẩm rất tốt, da tôi cải thiện rõ rệt.'),
(3, 3, 4, 'Son lên màu đẹp, bám lâu.');

-- Bảng messages (tin nhắn liên hệ)
INSERT INTO messages (user_id, name, email, phone, message) VALUES
(NULL, 'Khách ẩn danh', 'guest@example.com', '0123456789', 'Tôi muốn hỏi về sản phẩm serum.'),
(2, 'User1', 'user1@example.com', '0987654321', 'Khi nào sản phẩm kem chống nắng về hàng?');

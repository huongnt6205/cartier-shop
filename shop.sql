CREATE DATABASE cartier_shop CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_general_ci;

USE cartier_shop;

CREATE TABLE
    users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        user_type VARCHAR(20) NOT NULL DEFAULT 'user'
    );

CREATE TABLE
    category (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL
    );

CREATE TABLE
    product (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        category_id INT,
        description TEXT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        CONSTRAINT FK_category_product FOREIGN KEY (category_id) REFERENCES category(id)
    );

CREATE TABLE
    product_image (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product_id INT NOT NULL,
        is_primary BIT NOT NULL,
        image_url TEXT,
        CONSTRAINT FK_pd_pdimage FOREIGN KEY (product_id) REFERENCES product(id)
    );

INSERT INTO
    users (name, email, password, user_type)
VALUES
    (
        'huongnt',
        'huongnt06022005@gmail.com',
        'huong123',
        'admin'
    ),
    (
        'yenhai',
        'hungyenn044@gmail.com',
        'yen123',
        'admin'
    ),
    (
        'user1',
        'abc1234user1@gmail.com',
        '123456',
        'user'
    ),
    ('user3', 'background@gmail.com', '123456', 'user');
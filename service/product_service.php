<?php

require_once __DIR__ . "/../config/base_query.php";
require_once __DIR__ . "/../config/dbconfig.php";

const PRODUCT_TABLENAME = 'product';

function getAllProduct()
{
    $conn = connectDatabase();
    if (!$conn) return [];

    $stmt = $conn->query("SELECT * FROM product");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getByCategory($categoryId)
{
    return findBy(PRODUCT_TABLENAME, ['category_id' => $categoryId]);
}

function getProductById($productId)
{
    return findOneBy(PRODUCT_TABLENAME, ['id' => $productId]);
}

function addProduct($name, $price, $description, $category_id)
{
    $conn = connectDatabase();
    if (!$conn) {
        die("Không thể kết nối đến CSDL.");
    }
    $sql = "INSERT INTO product (name, price, description, category_id)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $price, $description, $category_id]);

    return $conn->lastInsertId();
}

function updateProduct($id, $name, $price, $description, $category_id)
{
    $pdo = connectDatabase();
    if (!$pdo) return false;

    $sql = "UPDATE product SET name = :name, price = :price, description = :description, category_id = :category_id WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':description' => $description,
        ':category_id' => $category_id,
        ':id' => $id,
    ]);
}

function deleteProductById($id) {
    $pdo = connectDatabase();
    if (!$pdo) return false;

    // Nếu bạn cũng muốn xóa ảnh trong bảng product_image
    $stmtImg = $pdo->prepare("DELETE FROM product_image WHERE product_id = :id");
    $stmtImg->execute([':id' => $id]);

    // Xóa sản phẩm
    $stmt = $pdo->prepare("DELETE FROM product WHERE id = :id");
    return $stmt->execute([':id' => $id]);
}
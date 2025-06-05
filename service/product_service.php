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

function addProduct($name, $price, $old_price, $description, $category_id)
{
    $conn = connectDatabase();
    if (!$conn) {
        die("Không thể kết nối đến CSDL.");
    }
    $sql = "INSERT INTO product (name, price, old_price, description, category_id)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $price, $old_price, $description, $category_id]);

    return $conn->lastInsertId();
}

function updateProduct($id, $name, $price, $old_price, $description, $category_id)
{
    $pdo = connectDatabase();
    if (!$pdo) return false;

    $sql = "UPDATE product SET name = :name, price = :price, old_price = :old_price, description = :description, category_id = :category_id WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':old_price' => $old_price,
        ':description' => $description,
        ':category_id' => $category_id,
        ':id' => $id,
    ]);
}

function deleteProductById($id)
{
    $pdo = connectDatabase();
    if (!$pdo) return false;

    // Nếu bạn cũng muốn xóa ảnh trong bảng product_image
    $stmtImg = $pdo->prepare("DELETE FROM product_image WHERE product_id = :id");
    $stmtImg->execute([':id' => $id]);

    // Xóa sản phẩm
    $stmt = $pdo->prepare("DELETE FROM product WHERE id = :id");
    return $stmt->execute([':id' => $id]);
}

// Lấy sản phẩm đang sale theo category
function getSaleProductsByCategory($categoryId)
{
    $conn = connectDatabase();
    if (!$conn) return [];

    $sql = "SELECT * FROM product WHERE category_id = :category_id AND old_price > price ORDER BY name";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['category_id' => $categoryId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Lấy sản phẩm không sale theo category
function getNonSaleProductsByCategory($categoryId)
{
    $conn = connectDatabase();
    if (!$conn) return [];

    $sql = "SELECT * FROM product WHERE category_id = :category_id AND (old_price IS NULL OR old_price <= price) ORDER BY name";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['category_id' => $categoryId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//tìm kiếm sp
function searchProductsByName($keyword)
{
    $conn = connectDatabase();
    if (!$conn) return [];

    $sql = "SELECT * FROM product WHERE name LIKE :keyword";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $keyword . "%";
    $stmt->bindParam(':keyword', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
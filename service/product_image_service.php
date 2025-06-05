<?php
require_once __DIR__ . "/../config/base_query.php";
require_once __DIR__ . "/../config/dbconfig.php";

const PRODUCT_IMAGE_TABLENAME = 'product_image';

function getProductPrimaryImageByProductId($productId)
{
    return findOneBy(PRODUCT_IMAGE_TABLENAME, ['product_id' => $productId, 'is_primary' => true]);
}

function getProductImageByProductId($productId)
{
    return findBy(PRODUCT_IMAGE_TABLENAME, ['product_id' => $productId]);
}

function addProductImage($productId, $imagePath, $isPrimary = false)
{
    $pdo = connectDatabase();
    if (!$pdo) return false;

    $sql = "INSERT INTO product_image (product_id, image_url, is_primary)
            VALUES (:product_id, :image_path, :is_primary)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        ':product_id' => $productId,
        ':image_path' => $imagePath,
        ':is_primary' => $isPrimary ? 1 : 0,
    ]);
}

function uploadImage($file, $uploadDir = __DIR__ . '/../upload/')
{
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $originalName = basename($file['name']);
    $uniqueName = time() . '_' . uniqid() . '_' . $originalName;
    $destination = $uploadDir . $uniqueName;

    // Di chuyển file tạm sang thư mục upload
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        return '/cartier-shop/upload/' . $uniqueName;
    }

    return false;
}
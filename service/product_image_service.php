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
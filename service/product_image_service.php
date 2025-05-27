<?php
require_once __DIR__ . "/../config/base_query.php";

const PRODUCT_IMAGE_TABLENAME = 'product_image';

function getProductPrimaryImageByProductId($productId)
{
    return findOneBy(PRODUCT_IMAGE_TABLENAME, ['product_id' => $productId, 'is_primary' => true]);
}

function getProductImageByProductId($productId)
{
    return findBy(PRODUCT_IMAGE_TABLENAME, ['product_id' => $productId]);
}

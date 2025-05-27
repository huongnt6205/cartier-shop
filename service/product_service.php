<?php

require_once __DIR__ . "/../config/base_query.php";

const PRODUCT_TABLENAME = 'product';

function getAllProduct()
{
    return findAll(PRODUCT_TABLENAME);
}

function getByCategory($categoryId)
{
    return findBy(PRODUCT_TABLENAME, ['category_id' => $categoryId]);
}

function getProductById($productId) {
    return findOneBy(PRODUCT_TABLENAME, ['id' => $productId]);
}
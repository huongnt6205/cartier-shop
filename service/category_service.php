<?php

require_once __DIR__ . "/../config/base_query.php";

const CATEGORY_TABLENAME = 'category';

function getAllCategory()
{
    return findAll(CATEGORY_TABLENAME);
}

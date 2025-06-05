<?php
require_once __DIR__ . '/../config/dbconfig.php'; // đường dẫn tới file dbconfig của bạn

function saveReview($product_id, $name, $review, $rating)
{
    $conn = connectDatabase();
    if (!$conn) return;

    $sql = "INSERT INTO reviews (product_id, name, review, rating) VALUES (:product_id, :name, :review, :rating)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':product_id' => $product_id,
        ':name' => $name,
        ':review' => $review,
        ':rating' => $rating
    ]);
}

function getReviewsByProductId($product_id)
{
    $conn = connectDatabase();
    if (!$conn) return [];

    $sql = "SELECT * FROM reviews WHERE product_id = :product_id ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':product_id' => $product_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

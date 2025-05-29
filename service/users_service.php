<?php

require_once __DIR__ . '/../config/base_query.php';

const USERS_TABLE = 'users';

/**
 * Lấy tổng số người dùng theo user_type (mặc định 'user')
 */
function getUserCount($userType = 'user')
{
    $conn = connectDatabase();
    $sql = "SELECT COUNT(*) as count FROM " . USERS_TABLE . " WHERE user_type = :user_type";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':user_type', $userType);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    } catch (PDOException $e) {
        error_log("Error in getUserCount: " . $e->getMessage());
        return 0;
    } finally {
        $conn = null;
    }
}

/**
 * Lấy danh sách tất cả người dùng, có thể truyền tham số sắp xếp, phân trang
 * $orderBy: ví dụ 'name ASC'
 * $limit, $offset: số lượng và vị trí bắt đầu lấy dữ liệu
 */
function getAllUsers($orderBy = null, $limit = null, $offset = null)
{
    return findAll(USERS_TABLE, $orderBy, $limit, $offset);
}

/**
 * Lấy chi tiết người dùng theo ID
 */
function getUserById($id)
{
    $result = findBy(USERS_TABLE, ['id' => $id]);
    return $result[0] ?? null;
}


function getUsersByType($userType) {
    return findBy('users', ['user_type' => $userType]);
}
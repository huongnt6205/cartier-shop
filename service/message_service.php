<?php
require_once __DIR__ . '/../config/dbconfig.php'; // Kết nối CSDL
require_once __DIR__ . "/../config/base_query.php";
// Lấy tất cả tin nhắn
function getAllMessages()
{
    $conn = connectDatabase();
    try {
        $stmt = $conn->query("SELECT * FROM message ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Lỗi lấy tất cả tin nhắn: " . $e->getMessage());
        return [];
    } finally {
        $conn = null;
    }
}

// Xoá tin nhắn theo ID
function deleteMessageById($id)
{
    $conn = connectDatabase();
    try {
        $stmt = $conn->prepare("DELETE FROM message WHERE id = ?");
        return $stmt->execute([$id]);
    } catch (PDOException $e) {
        error_log("Lỗi xoá tin nhắn: " . $e->getMessage());
        return false;
    } finally {
        $conn = null;
    }
}

// Đếm tổng số tin nhắn
function getMessageCount()
{
    $conn = connectDatabase();
    try {
        $stmt = $conn->query("SELECT COUNT(*) AS total FROM message");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int)$result['total'] : 0;
    } catch (PDOException $e) {
        error_log("Lỗi đếm tin nhắn: " . $e->getMessage());
        return 0;
    } finally {
        $conn = null;
    }
}

// Lấy 1 tin nhắn theo ID
function getMessageById($id)
{
    $conn = connectDatabase();
    try {
        $stmt = $conn->prepare("SELECT * FROM message WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Lỗi lấy tin nhắn theo ID: " . $e->getMessage());
        return null;
    } finally {
        $conn = null;
    }
}

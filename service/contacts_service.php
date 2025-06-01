<?php
require_once __DIR__ . '/../config/base_query.php';

function saveContact($data)
{
    $conn = connectDatabase();
    $sql = "INSERT INTO message (name, order_id, phone, message) VALUES (:name, :order_id, :phone, :message)";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':order_id', $data['order_id']);
        $stmt->bindValue(':phone', $data['phone']);
        $stmt->bindValue(':message', $data['message']);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Lỗi lưu liên hệ: " . $e->getMessage());
        return false;
    } finally {
        $conn = null;
    }
}

function getAllMessages()
{
    
    $conn = connectDatabase();
    $sql = "SELECT * FROM message ORDER BY id DESC";
    try {
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Lỗi lấy liên hệ: " . $e->getMessage());
        return [];
    } finally {
        $conn = null;
    }
}
function getMessageById($id)
{
    $conn = connectDatabase();
    $sql = "SELECT * FROM message WHERE id = :id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Lỗi lấy tin nhắn theo ID: " . $e->getMessage());
        return false;
    } finally {
        $conn = null;
    }
}


function deleteMessageById($id)
{
    $conn = connectDatabase();
    $sql = "DELETE FROM message WHERE id = :id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Lỗi xóa liên hệ: " . $e->getMessage());
        return false;
    } finally {
        $conn = null;
    }
}

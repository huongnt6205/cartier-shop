<?php

require_once __DIR__ . "/dbconfig.php";

function findAll($tableName, $orderBy = null, $limit = null, $offset = null)
{
    $conn = connectDatabase();
    $query = "SELECT * FROM $tableName";

    if (!is_null($orderBy)) {
        $query .= " ORDER BY $orderBy";
    }

    if (!is_null($limit)) {
        $query .= " LIMIT $limit";
    }

    if (!is_null($offset)) {
        $query .= " OFFSET $offset";
    }

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        return null;
    } finally {
        $conn = null;
    }
}

function findBy($tableName, $conditions, $orderBy = null, $limit = null, $offset = null)
{
    $conn = connectDatabase();

    $query = "SELECT * FROM $tableName";

    if (!empty($conditions)) {
        $query .= " WHERE ";
        $parts = [];
        foreach ($conditions as $key => $value) {
            $parts[] = "$key = :$key";
        }
        $query .= implode(" AND ", $parts);
    }

    if (!is_null($orderBy)) {
        $query .= " ORDER BY $orderBy";
    }

    if (!is_null($limit)) {
        $query .= " LIMIT $limit";
    }

    if (!is_null($offset)) {
        $query .= " OFFSET $offset";
    }

    try {
        $stmt = $conn->prepare($query);
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        return null;
    } finally {
        $conn = null;
    }
}

function findOneBy($tableName, $conditions)
{
    $conn = connectDatabase();

    $query = "SELECT * FROM $tableName";

    if (!empty($conditions)) {
        $query .= " WHERE ";
        $parts = [];
        foreach ($conditions as $key => $value) {
            $parts[] = "$key = :$key";
        }
        $query .= implode(" AND ", $parts);
    }

    try {
        $stmt = $conn->prepare($query);
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result;
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        return null;
    } finally {
        $conn = null;
    }
}

function execute($sql)
{
    $conn = connectDatabase();
    try {
        $affectedRows = $conn->exec($sql);
        return $affectedRows;
    } catch (PDOException $e) {
        error_log("SQL Error: " . $e->getMessage());
        return false;
    } finally {
        $conn = null;
    }
}

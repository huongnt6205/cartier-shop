<?php
const HOST = "localhost";
const PORT = 3306;
const DATABASE = "cartier_shop";
const USER_NAME = "root";
const PASSWORD = "";

function connectDatabase()
{
    try {
        $conn = new PDO("mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DATABASE . ";charset=utf8", USER_NAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
    }
}
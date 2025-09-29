<?php
$host = "db";          // or "localhost" depending on Docker service name
$dbname = "one_farm_db";
$user = "root";        // match your docker-compose/mysql user
$pass = "example";     // match your docker-compose/mysql password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

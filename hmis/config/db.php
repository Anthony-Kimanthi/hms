<?php
$host = "db";          // service name in docker-compose
$dbname = "hmis_db";   // database name from compose
$username = "hmis_user"; // MYSQL_USER
$password = "hmis_pass"; // MYSQL_PASSWORD

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

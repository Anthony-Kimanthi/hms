<?php
$host = 'db';           // matches service name in docker-compose
$db   = 'hmis_db';      // same as MYSQL_DATABASE
$user = 'hmis_user';    // same as MYSQL_USER
$pass = 'hmis_pass';    // same as MYSQL_PASSWORD
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

<?php
require_once __DIR__ . '/config/db.php';

// Users to create
$users = [
    ['username' => 'admin',   'password' => 'admin123',   'role' => 'admin'],
    ['username' => 'doctor1', 'password' => 'doctor123',  'role' => 'doctor'],
    ['username' => 'nurse1',  'password' => 'nurse123',   'role' => 'nurse'],
    ['username' => 'lab1',    'password' => 'lab123',     'role' => 'lab'],
    ['username' => 'pharma1', 'password' => 'pharma123',  'role' => 'pharmacy'],
];

foreach ($users as $u) {
    $hash = password_hash($u['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$u['username'], $hash, $u['role']]);
        echo "✅ User {$u['username']} created with role {$u['role']}<br>";
    } catch (PDOException $e) {
        echo "⚠️ Skipped {$u['username']} (maybe already exists)<br>";
    }
}

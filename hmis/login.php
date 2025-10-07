<?php
session_start();
require_once __DIR__ . '/config/db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    echo "<h2>DEBUG: Login attempt</h2>";

    try {
        $currentDb = $pdo->query('SELECT DATABASE()')->fetchColumn();
        echo "<p><strong>Connected DB:</strong> " . htmlspecialchars($currentDb) . "</p>";
    } catch (Exception $e) {
        echo "<p style='color:red;'><strong>DB error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    }

    if (!$username || !$password) {
        echo "<p style='color:orange;'>Please provide username and password.</p>";
        echo "<p><a href=''>Back</a></p>";
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "<p style='color:red;'><strong>No user found</strong> for username: " . htmlspecialchars($username) . "</p>";
            echo "<p>Check phpMyAdmin: <code>SELECT username FROM users;</code></p>";
            exit;
        }

        echo "<p><strong>User row fetched:</strong></p>";
        echo "<pre>" . htmlspecialchars(print_r($user, true)) . "</pre>";

        $storedHash = $user['password'] ?? '';
        echo "<p><strong>Stored hash:</strong> <code>" . htmlspecialchars($storedHash) . "</code></p>";

        $verify = false;

        // Detect if it's a bcrypt hash
        if (preg_match('/^\$2y\$/', $storedHash)) {
            $verify = password_verify($password, $storedHash);
        } else {
            // Fallback: legacy plain text password
            if ($password === $storedHash) {
                $verify = true;

                // Optional: rehash and update to bcrypt
                $newHash = password_hash($password, PASSWORD_BCRYPT);
                $update = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
                $update->execute([$newHash, $user['id']]);
                echo "<p style='color:orange;'>Legacy password detected — rehashed and updated to bcrypt.</p>";
            }
        }

        echo "<p><strong>password_verify result:</strong> " . ($verify ? "<span style='color:green'>TRUE</span>" : "<span style='color:red'>FALSE</span>") . "</p>";

        if ($verify) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            echo "<p style='color:green;'>✅ Login successful for user: " . htmlspecialchars($user['username']) . " (role: " . htmlspecialchars($user['role']) . ").</p>";
            echo "<p><em>(Debug mode: not redirecting.)</em></p>";
        } else {
            echo "<p style='color:red;'>❌ Invalid username or password (verification failed).</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color:red;'><strong>Query error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    }

    echo "<p><a href=''>Back to login form</a></p>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HMIS Login (DEBUG)</title>
</head>
<body>
    <h2>Login (DEBUG)</h2>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>

<?php
// --- DEV MODE: Skip login entirely ---
$DEV_MODE = true; // change to false later when done

if ($DEV_MODE) {
    session_start();
    $_SESSION['username'] = 'DevUser';
    $_SESSION['role'] = 'admin'; // you can change this
    header("Location: modules/admin/dashboard.php");
    exit;
}
?>

session_start();
require_once __DIR__ . '/config/db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $storedHash = $user['password'];

            $verify = true;
            if (preg_match('/^\$2y\$/', $storedHash)) {
                $verify = password_verify($password, $storedHash);
            } else {
                if ($password === $storedHash) {
                    $verify = true;
                    // Auto-upgrade legacy password
                    $newHash = password_hash($password, PASSWORD_BCRYPT);
                    $update = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
                    $update->execute([$newHash, $user['id']]);
                }
            }

            if ($verify) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirect based on role
                switch ($user['role']) {
                    case 'admin':
                        header("Location: modules/admin/dashboard.php");
                        break;
                    case 'doctor':
                        header("Location: modules/doctor/dashboard.php");
                        break;
                    case 'nurse':
                        header("Location: modules/nurse/dashboard.php");
                        break;
                    case 'lab':
                        header("Location: modules/lab/dashboard.php");
                        break;
                    case 'pharmacy':
                        header("Location: modules/pharmacy/dashboard.php");
                        break;
                    case 'reception':
                        header("Location: modules/reception/dashboard.php");
                        break;
                    default:
                        header("Location: unauthorized.php");
                }
                exit;
            } else {
                $error = "Invalid username or password!";
            }
        } else {
            $error = "No such user found.";
        }
    } else {
        $error = "Please enter both username and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HMIS Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9fafb;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
        }
        p.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>HMIS Login</h2>
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

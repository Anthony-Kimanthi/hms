<?php
session_start();

// Always load db.php from config folder
require_once __DIR__ . '/../config/db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Save session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            switch ($user['role']) {
                case 'admin':
                    header("Location: ../modules/admin/dashboard.php");
                    break;
                case 'doctor':
                    header("Location: ../modules/doctor/dashboard.php");
                    break;
                case 'nurse':
                    header("Location: ../modules/nurse/dashboard.php");
                    break;
                case 'lab':
                    header("Location: ../modules/lab/dashboard.php");
                    break;
                case 'pharmacy':
                    header("Location: ../modules/pharmacy/dashboard.php");
                    break;
                default:
                    header("Location: unauthorized.php");
            }
            exit;
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Please enter both username and password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HMIS Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>

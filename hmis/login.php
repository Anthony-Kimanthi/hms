<?php
session_start();

// Always load db.php from config folder
require_once __DIR__ . '/config/db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // ---------- DEBUG BLOCK (temporary) ----------
        // Enable by visiting: login.php?debug=1 and then submit the form.
        if (isset($_GET['debug']) && $_GET['debug'] === '1') {
            echo "<pre>DEBUG OUTPUT\n\n";
            echo "Entered username (raw): " . var_export($_POST['username'], true) . "\n";
            echo "Trimmed username used in query: " . var_export($username, true) . "\n";
            echo "Entered password (raw): " . var_export($password, true) . "\n\n";

            if ($user === false) {
                echo "QUERY RESULT: NO ROW RETURNED (user === false)\n\n";
                // Show available databases/tables that PHP can see
                try {
                    $rows = $pdo->query("SHOW DATABASES")->fetchAll();
                    echo "Databases visible to this PDO user:\n";
                    foreach ($rows as $r) { echo " - " . implode(", ", $r) . "\n"; }
                    echo "\n";
                } catch (Exception $e) {
                    echo "Could not list databases: " . $e->getMessage() . "\n\n";
                }
            } else {
                echo "QUERY RESULT: ROW FOUND\n\n";
                echo "Row contents:\n";
                print_r($user);
                echo "\n";
                echo "DB username exact (with length): " . $user['username'] . " (len=" . mb_strlen($user['username']) . ")\n";
                echo "DB password hash (with length): " . $user['password'] . " (len=" . mb_strlen($user['password']) . ")\n\n";
                $verify = password_verify($password, $user['password']) ? 'TRUE' : 'FALSE';
                echo "password_verify(result): " . $verify . "\n";
            }

            echo "\nEND DEBUG\n</pre>";
            exit;
        }
        // --------------------------------------------

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

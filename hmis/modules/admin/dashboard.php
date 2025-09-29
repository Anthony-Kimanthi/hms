<?php
require_once __DIR__ . '/../../auth_check.php';

// Only allow admin role
checkRole(['admin']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome Admin <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p>This is the admin dashboard.</p>
</body>
</html>

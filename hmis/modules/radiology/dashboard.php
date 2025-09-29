<?php
require_once __DIR__ . '/../../auth_check.php';

// Only allow admin role
checkRole(['radiology']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome Admin <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p>This is the Radio dashboard.</p>
</body>
</html>

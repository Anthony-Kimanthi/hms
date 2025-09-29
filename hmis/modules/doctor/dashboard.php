<?php
require_once __DIR__ . '/../../auth_check.php';

// Only allow doctor role
checkRole(['doctor']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
</head>
<body>
    <h2>Welcome, Dr. <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p>This is the doctor’s dashboard.</p>
</body>
</html>


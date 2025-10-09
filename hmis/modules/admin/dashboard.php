<?php
require_once __DIR__ . '/../../auth_check.php';
require_once __DIR__ . '/../../config/db.php';
checkRole(['admin']); // change role per file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/hmis/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    <div class="main-container">
        <?php include __DIR__ . '/../../includes/sidebar.php'; ?>
        <div class="content with-header">
            <!-- role-specific content here -->
            <div class="content with-header">
    <h2>Welcome, Admin <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
    <p>System overview and quick management links:</p>

    <div class="dashboard-cards">
        <div class="card">
            <h3>Users</h3>
            <p>Manage all system users.</p>
            <a href="/hmis/modules/users/dashboard.php">Open</a>
        </div>
        <div class="card">
            <h3>System Logs</h3>
            <p>Monitor security and access logs.</p>
            <a href="/hmis/modules/logs/dashboard.php">View Logs</a>
        </div>
        <div class="card">
            <h3>Reports</h3>
            <p>Access global hospital reports.</p>
            <a href="/hmis/modules/reports/dashboard.php">Reports</a>
        </div>
        <div class="card">
            <h3>Settings</h3>
            <p>Configure modules and system parameters.</p>
            <a href="/hmis/modules/settings/dashboard.php">Settings</a>
        </div>
    </div>
</div>

        </div>
    </div>
    <script src="/hmis/js/script.js"></script>
</body>
</html>


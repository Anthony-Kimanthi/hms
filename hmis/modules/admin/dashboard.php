<?php
require_once __DIR__ . '/../../auth_check.php';
checkRole(['admin']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/script.js" defer></script>
</head>
<body>

    <!-- Sidebar -->
    <?php include '../../includes/sidebar.php'; ?>

    <!-- Header -->
    <div class="header">
        <span id="menu-toggle" class="menu-toggle">☰</span>
        <h1>Admin Dashboard</h1>
    </div>

    <!-- Main Content -->
    <div class="content with-header">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
        <p>Here's an overview of the system activity and quick access to management tools.</p>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="card">
                <h3>Users</h3>
                <p>Manage system users</p>
                <a href="../users/dashboard.php">Open</a>
            </div>

            <div class="card">
                <h3>Reports</h3>
                <p>View system reports</p>
                <a href="../reports/dashboard.php">Open</a>
            </div>

            <div class="card">
                <h3>Settings</h3>
                <p>System configuration</p>
                <a href="../settings/dashboard.php">Access</a>
            </div>

            <div class="card">
                <h3>Database</h3>
                <p>Backup & maintenance</p>
                <a href="../database/dashboard.php">Manage</a>
            </div>
        </div>
    </div>

</body>
</html>

<?php
session_start();
require_once __DIR__ . '/../../config/db.php';

// --- Role Check Function ---
function checkRole($role) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
        header("Location: /unauthorized.php");
        exit;
    }
}

// --- Require Admin Role ---
checkRole('admin');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/script.js" defer></script>
</head>
<body>

    <!-- Sidebar -->
    <?php include __DIR__ . '/../../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="content with-header">
        <div class="header">
            <span id="menu-toggle" class="menu-toggle">☰</span>
            <h1>Admin Dashboard</h1>
        </div>

        <div class="dashboard-cards">
            <div class="card">
                <h3>Manage Users</h3>
                <p>Add, edit, and remove user accounts.</p>
                <a href="users.php">Go</a>
            </div>

            <div class="card">
                <h3>Radiology</h3>
                <p>Manage radiology reports and imaging data.</p>
                <a href="../radiology/dashboard.php">Go</a>
            </div>

            <div class="card">
                <h3>Reports</h3>
                <p>View system-wide statistics and reports.</p>
                <a href="../reports/dashboard.php">Go</a>
            </div>

            <div class="card">
                <h3>System Settings</h3>
                <p>Configure global HMIS settings and backups.</p>
                <a href="settings.php">Go</a>
            </div>

            <div class="card">
                <h3>Logout</h3>
                <p>Sign out of the admin session securely.</p>
                <a href="/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>

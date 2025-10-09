<?php
require_once __DIR__ . '/../../auth_check.php';
require_once __DIR__ . '/../../config/db.php';

// Restrict to admin role
checkRole(['admin']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/hmis/css/style.css">
</head>
<body>

    <?php include __DIR__ . '/../../includes/header.php'; ?>
    <div class="main-container">
        <?php include __DIR__ . '/../../includes/sidebar.php'; ?>

        <div class="content">
            <h2>Welcome, Admin <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
            <p>This is your HMIS Admin Dashboard.</p>

            <div class="dashboard-cards">
                <div class="card">
                    <h3>Doctors</h3>
                    <p><a href="/hmis/modules/doctor/dashboard.php">View</a></p>
                </div>

                <div class="card">
                    <h3>Nurses</h3>
                    <p><a href="/hmis/modules/nurse/dashboard.php">View</a></p>
                </div>

                <div class="card">
                    <h3>Pharmacy</h3>
                    <p><a href="/hmis/modules/pharmacy/dashboard.php">View</a></p>
                </div>

                <div class="card">
                    <h3>Lab</h3>
                    <p><a href="/hmis/modules/lab/dashboard.php">View</a></p>
                </div>

                <div class="card">
                    <h3>Reports</h3>
                    <p><a href="/hmis/reports.php">View</a></p>
                </div>
            </div>
        </div>
    </div>

<script src="/hmis/js/script.js"></script>
</body>
</html>

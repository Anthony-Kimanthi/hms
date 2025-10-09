<?php
require_once __DIR__ . '/../../auth_check.php';
require_once __DIR__ . '/../../config/db.php';
checkRole(['doctor']); // change role per file
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
    <h2>Welcome Dr. <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
    <p>Today’s overview:</p>

    <div class="dashboard-cards">
        <div class="card">
            <h3>Patients</h3>
            <p>View and update patient records.</p>
            <a href="/hmis/modules/patients/dashboard.php">View Patients</a>
        </div>
        <div class="card">
            <h3>Appointments</h3>
            <p>Check and manage today’s schedule.</p>
            <a href="/hmis/modules/appointments/dashboard.php">View Schedule</a>
        </div>
        <div class="card">
            <h3>Reports</h3>
            <p>Access lab and radiology reports.</p>
            <a href="/hmis/modules/reports/dashboard.php">Reports</a>
        </div>
    </div>
</div>
        </div>
    </div>
    <script src="/hmis/js/script.js"></script>
</body>
</html>

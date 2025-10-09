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
    <h2>Welcome Nurse <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
    <p>Ward & patient management tools:</p>

    <div class="dashboard-cards">
        <div class="card">
            <h3>Triage</h3>
            <p>Record vital signs and initial assessments.</p>
            <a href="/hmis/modules/triage/dashboard.php">Open</a>
        </div>
        <div class="card">
            <h3>Patients</h3>
            <p>Monitor patient status and notes.</p>
            <a href="/hmis/modules/patients/dashboard.php">View Patients</a>
        </div>
        <div class="card">
            <h3>Reports</h3>
            <p>Submit or review nursing reports.</p>
            <a href="/hmis/modules/reports/dashboard.php">Reports</a>
        </div>
    </div>
</div>
        </div>
    </div>
    <script src="/hmis/js/script.js"></script>
</body>
</html>

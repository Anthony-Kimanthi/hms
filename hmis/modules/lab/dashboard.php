<?php
require_once __DIR__ . '/../../auth_check.php';
require_once __DIR__ . '/../../config/db.php';
checkRole(['lab']); // change role per file
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
    <h2>Welcome Lab Tech <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
    <p>Quick access to test operations:</p>

    <div class="dashboard-cards">
        <div class="card">
            <h3>New Tests</h3>
            <p>Record new lab test results.</p>
            <a href="/hmis/modules/lab/tests.php">Add Test</a>
        </div>
        <div class="card">
            <h3>Pending Tests</h3>
            <p>View unverified or pending results.</p>
            <a href="/hmis/modules/lab/pending.php">Pending</a>
        </div>
        <div class="card">
            <h3>Reports</h3>
            <p>Generate lab reports.</p>
            <a href="/hmis/modules/reports/dashboard.php">Reports</a>
        </div>
    </div>
</div>
        </div>
    </div>
    <script src="/hmis/js/script.js"></script>
</body>
</html>

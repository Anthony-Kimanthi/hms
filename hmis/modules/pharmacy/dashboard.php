<?php
require_once __DIR__ . '/../../auth_check.php';
require_once __DIR__ . '/../../config/db.php';
checkRole(['pharmacy']); // change role per file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    <div class="main-container">
        <?php include __DIR__ . '/../../includes/sidebar.php'; ?>
        <div class="content with-header">
            <!-- role-specific content here -->

        <div class="content with-header">
    <h2>Welcome Pharmacist <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
    <p>Inventory and prescription tools:</p>

    <div class="dashboard-cards">
        <div class="card">
            <h3>Prescriptions</h3>
            <p>View and process prescriptions.</p>
            <a href="/hmis/modules/pharmacy/prescriptions.php">View</a>
        </div>
        <div class="card">
            <h3>Stock</h3>
            <p>Manage and update drug inventory.</p>
            <a href="/hmis/modules/pharmacy/stock.php">Inventory</a>
        </div>
        <div class="card">
            <h3>Reports</h3>
            <p>Track usage and stock reports.</p>
            <a href="/hmis/modules/reports/dashboard.php">Reports</a>
        </div>
    </div>
</div>

        </div>
    </div>
    <script src="../../js/script.js"></script>
</body>
</html>

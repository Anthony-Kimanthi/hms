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
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <?php include __DIR__ . '/../../includes/header.php'; ?>

    <div class="main-container">
        <?php include __DIR__ . '/../../includes/sidebar.php'; ?>

        <div class="content">
            <h2>Welcome, Admin <?= htmlspecialchars($_SESSION['username']); ?> 👋</h2>
            <p>This is your central HMIS Administration Dashboard.</p>

            <div class="dashboard-cards">
                <div class="card">
                    <i class="fa-solid fa-user-doctor"></i>
                    <h3>Doctors</h3>
                    <a href="/modules/doctors.php" class="btn">Manage</a>
                </div>

                <div class="card">
                    <i class="fa-solid fa-user-nurse"></i>
                    <h3>Nurses</h3>
                    <a href="/modules/triage.php" class="btn">Manage</a>
                </div>

                <div class="card">
                    <i class="fa-solid fa-pills"></i>
                    <h3>Pharmacy</h3>
                    <a href="/modules/pharmacy.php" class="btn">Manage</a>
                </div>

                <div class="card">
                    <i class="fa-solid fa-flask-vial"></i>
                    <h3>Lab</h3>
                    <a href="/modules/lab.php" class="btn">Manage</a>
                </div>

                <div class="card">
                    <i class="fa-solid fa-file-medical"></i>
                    <h3>Reports</h3>
                    <a href="/modules/reports.php" class="btn">View Reports</a>
                </div>
            </div>
        </div>
    </div>

<script src="/js/script.js"></script>
</body>
</html>

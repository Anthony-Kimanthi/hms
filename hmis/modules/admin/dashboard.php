<?php
session_start();
require_once __DIR__ . '/../../config/db.php';

// Role check helper
function checkRole($requiredRole) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $requiredRole) {
        header("Location: ../../unauthorized.php");
        exit;
    }
}

// ✅ Restrict to Admins only
checkRole('admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | HMIS</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- JS -->
    <script src="../../js/script.js" defer></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f8;
            margin: 0;
            display: flex;
        }

        .dashboard-container {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
        }

        h1 {
            font-weight: 600;
            color: #333;
            margin-bottom: 2rem;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 1.5rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .card h3 {
            color: #007bff;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card p {
            color: #555;
            margin-top: 10px;
            font-size: 0.95rem;
        }

        .card a {
            display: inline-block;
            margin-top: 12px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.2s ease;
        }

        .card a:hover {
            background: #0056b3;
        }

        /* Responsive sidebar */
        @media (max-width: 768px) {
            .dashboard-container {
                margin-left: 0;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include '../../includes/sidebar.php'; ?>

    <div class="dashboard-container">
        <h1><i class="fa-solid fa-user-shield"></i> Admin Dashboard</h1>

        <div class="dashboard-grid">
            <div class="card">
                <h3><i class="fa-solid fa-users-gear"></i> Manage Users</h3>
                <p>Add, edit, and remove system user accounts.</p>
                <a href="users.php">Go</a>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-x-ray"></i> Radiology</h3>
                <p>Manage radiology reports and imaging data.</p>
                <a href="../radiology/dashboard.php">Go</a>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-chart-line"></i> Reports</h3>
                <p>View system-wide statistics and reports.</p>
                <a href="../reports/dashboard.php">Go</a>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-gears"></i> System Settings</h3>
                <p>Configure HMIS settings, backups, and roles.</p>
                <a href="settings.php">Go</a>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-users"></i> Patients</h3>
                <p>View, register, and manage patient records.</p>
                <a href="../patients/dashboard.php">Go</a>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-prescription-bottle-medical"></i> Pharmacy</h3>
                <p>Manage pharmacy stock and prescriptions.</p>
                <a href="../pharmacy/dashboard.php">Go</a>
            </div>
        </div>
    </div>
</body>
</html>

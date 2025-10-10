<?php
session_start();
require_once __DIR__ . '/../../auth_check.php';

// ✅ Allow Admins and Nurses
checkRole(['admin', 'nurse']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Dashboard | HMIS</title>

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
            margin-left: 250px; /* ✅ Fix sidebar spacing */
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
        <h1><i class="fa-solid fa-pills"></i> Pharmacy Dashboard</h1>

        <div class="dashboard-grid">
            <div class="card">
                <h3><i class="fa-solid fa-prescription-bottle-medical"></i> Prescriptions</h3>
                <p>View and process patient prescriptions.</p>
                <a href="prescriptions.php">View</a>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-boxes-stacked"></i> Stock</h3>
                <p>Manage and update the drug inventory.</p>
                <a href="inventory.php">Inventory</a>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-chart-line"></i> Reports</h3>
                <p>Track usage and stock-level reports.</p>
                <a href="reports.php">Reports</a>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-syringe"></i> Supplies</h3>
                <p>Manage medical supplies and logistics.</p>
                <a href="supplies.php">Manage</a>
            </div>
        </div>
    </div>
</body>
</html>

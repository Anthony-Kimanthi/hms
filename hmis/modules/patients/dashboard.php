<?php
require_once '../../config/db.php'; // uses $pdo from your db.php

$pageTitle = "Patients Dashboard";
$pageHeader = "Patients";
$pageDescription = "Manage and view registered patients.";

// Fetch all patients
try {
    $stmt = $pdo->query("SELECT * FROM patients ORDER BY id DESC");
    $patients = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Database query failed: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle) ?> - HMIS</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f8;
            margin: 0;
            display: flex;
        }

        .content {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
        }

        h1 {
            color: #333;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007bff;
            color: #fff;
        }

        tr:hover {
            background: #f1f1f1;
        }

        a.btn {
            display: inline-block;
            padding: 8px 12px;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .btn-add { background: #28a745; }
        .btn-edit { background: #ffc107; }
        .btn-del { background: #dc3545; }

        .actions {
            display: flex;
            gap: 10px;
        }

        .success-msg {
            background: #d1e7dd;
            color: #0f5132;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php include '../../includes/sidebar.php'; ?>

    <div class="content">
        <h1><i class="fa-solid fa-users"></i> <?= htmlspecialchars($pageHeader) ?></h1>
        <p><?= htmlspecialchars($pageDescription) ?></p>

        <?php if (isset($_GET['success'])): ?>
            <div class="success-msg">✅ Patient saved successfully.</div>
        <?php endif; ?>

        <a href="add_edit.php" class="btn btn-add"><i class="fa-solid fa-user-plus"></i> Add Patient</a>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date Registered</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($patients) > 0): 
                $i = 1;
                foreach ($patients as $row): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($row['fullname']) ?></td>
                    <td><?= htmlspecialchars($row['gender']) ?></td>
                    <td><?= htmlspecialchars($row['age']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= htmlspecialchars($row['address']) ?></td>
                    <td><?= htmlspecialchars($row['date_registered']) ?></td>
                    <td class="actions">
                        <a href="edit_patient.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="delete_patient.php?id=<?= $row['id'] ?>" class="btn btn-del" onclick="return confirm('Delete this patient?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="8">No patients found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

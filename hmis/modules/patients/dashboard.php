<?php
require_once '../../config/db.php';
$pageTitle = "Patients Dashboard";
$pageHeader = "Patient Demographics ";
$pageDescription = "Manage patient registration and search existing records.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> - HMIS</title>
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
            padding: 3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        p {
            color: #666;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            margin: 0 10px;
            font-size: 1rem;
        }

        .btn-add {
            background: #28a745;
        }

        .search-box {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: center;
            margin-top: 1.5rem;
        }

        .search-box input[type="text"] {
            padding: 10px;
            width: 280px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .btn-search {
            background: #007bff;
        }

        .btn-search i {
            margin-right: 6px;
        }
    </style>
</head>
<body>
    <?php include '../../includes/sidebar.php'; ?>

    <div class="content">
        <h1><i class="fa-solid fa-users"></i> <?= $pageHeader ?></h1>
        <p><?= $pageDescription ?></p>

        <a href="add_edit.php" class="btn btn-add">
            <i class="fa-solid fa-user-plus"></i> Register New Patient
        </a>

        <form action="search.php" method="GET" class="search-box">
            <input type="text" name="query" placeholder="Search patient by name, phone, or ID..." required>
            <button type="submit" class="btn btn-search">
                <i class="fa-solid fa-magnifying-glass"></i> Search
            </button>
        </form>
    </div>
</body>
</html>

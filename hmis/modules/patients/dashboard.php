<?php
// Example: for Patients module
$pageTitle = "Patients";
$pageHeader = "Patients";
$pageDescription = "Manage and view registered patients.";

// Dynamically determine the project root path
$rootPath = dirname(__DIR__, 2); // Go up 2 levels from /modules/patients/
include_once "$rootPath/includes/header.php";
include_once "$rootPath/includes/sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> - InfiHealth HMIS</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <div class="content with-header">
        <h1><?= $pageHeader ?></h1>
        <p><?= $pageDescription ?></p>

        <section class="patients-overview">
            <h2>Patient Overview</h2>
            <p>Below is a quick overview of patients in the system.</p>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Date Registered</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mary Njeri</td>
                        <td>Female</td>
                        <td>32</td>
                        <td>0712345678</td>
                        <td>2025-10-10</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>John Otieno</td>
                        <td>Male</td>
                        <td>28</td>
                        <td>0722334455</td>
                        <td>2025-09-28</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <script src="/js/script.js"></script>
</body>
</html>

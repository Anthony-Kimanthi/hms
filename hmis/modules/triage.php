<?php
// Example: for Billing, rename the file to billing.php
$pageTitle = "Triage";      // e.g., "Billing"
$pageHeader = "Triage";     // e.g., "Billing"
$pageDescription = "OP Nurse examination modules, vital recordings, HOPI etc."; // e.g., "Process payments and generate invoices."
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> - InfiHealth HMIS</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <?php include __DIR__ . '/includes/sidebar.php';?> 
    <?php include __DIR__ . '/includes/header.php';?> 

    <div class="content with-header">
        <h1><?= $pageHeader ?></h1>
        <p><?= $pageDescription ?></p>

        <!-- Module-specific content goes here -->
        <!-- Example: table of patients, billing list, doctor schedules, etc. -->
    </div>

    <script src="./js/script.js"></script>
</body>
</html>

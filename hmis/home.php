<?php
session_start();

// Only logged-in users can see home
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

$pageTitle = "Home";
$pageHeader = "Home";
$pageDescription = "Welcome to InfiHealth MIS";
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
    </div>
    <script src="./js/script.js"></script>
</body>
</html>





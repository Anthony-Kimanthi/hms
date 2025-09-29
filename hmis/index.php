<?php
session_start();

// If not logged in, go to login
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

// Redirect by role
switch ($_SESSION['role']) {
    case 'admin':
        header("Location: modules/admin/dashboard.php");
        exit;
    case 'doctor':
        header("Location: modules/doctor/dashboard.php");
        exit;
    case 'nurse':
        header("Location: modules/nurse/dashboard.php");
        exit;
    case 'lab':
        header("Location: modules/lab/dashboard.php");
        exit;
    case 'pharmacy':
        header("Location: modules/pharmacy/dashboard.php");
        exit;
    default:
        // fallback to shared home if role doesn’t match
        header("Location: home.php");
        exit;
}

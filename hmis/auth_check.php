<?php
session_start();

function checkRole($allowedRoles = []) {
    if (!isset($_SESSION['role'])) {
        header("Location: /login.php");
        exit;
    }

    // ✅ Admin can access everything
    if ($_SESSION['role'] === 'admin') {
        return;
    }

    // Check allowed roles for others
    if (!in_array($_SESSION['role'], (array)$allowedRoles)) {
        header("Location: /unauthorized.php");
        exit;
    }
}
?>

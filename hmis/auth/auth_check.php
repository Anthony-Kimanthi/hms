<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$allowed_roles = $allowed_roles ?? []; // fallback if not set
if (!empty($allowed_roles) && !in_array($_SESSION['role'], $allowed_roles)) {
    header("Location: ../unauthorized.php");
    exit;
}
?>

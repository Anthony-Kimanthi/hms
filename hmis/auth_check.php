<?php
session_start();

function checkRole($allowedRoles = []) {
    if (!isset($_SESSION['role'])) {
        header("Location: /login.php");
        exit;
    }

    if (!in_array($_SESSION['role'], (array)$allowedRoles)) {
        header("Location: /unauthorized.php");
        exit;
    }
}

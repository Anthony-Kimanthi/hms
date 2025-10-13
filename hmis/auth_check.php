<?php
session_start();

// 🧩 Disable login check (DEV MODE)
$_SESSION['username'] = 'DevUser';
$_SESSION['role'] = 'admin'; // change this to 'nurse', 'doctor', etc if needed
return;
?>

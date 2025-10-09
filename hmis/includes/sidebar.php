<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
$user_role = $_SESSION['role'] ?? 'guest'; // fallback for safety
?>

<div class="sidebar" id="sidebar">
    <h2>HMIS</h2>
    <ul>
        <!-- Common to all logged-in users -->
        <li><a href="/home.php" class="<?= $current_page === 'home.php' ? 'active' : '' ?>">
            <i class="fas fa-home"></i> Home
        </a></li>

        <?php if ($user_role === 'admin'): ?>
            <li><a href="/modules/admin/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/admin/') !== false ? 'active' : '' ?>">
                <i class="fas fa-user-shield"></i> Admin Dashboard
            </a></li>
            <li><a href="/modules/users/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/users/') !== false ? 'active' : '' ?>">
                <i class="fas fa-users"></i> Manage Users
            </a></li>
            <li><a href="/modules/reports/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/reports/') !== false ? 'active' : '' ?>">
                <i class="fas fa-chart-bar"></i> Reports
            </a></li>
            <li><a href="/modules/settings/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/settings/') !== false ? 'active' : '' ?>">
                <i class="fas fa-cogs"></i> Settings
            </a></li>
            <li><a href="/modules/database/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/database/') !== false ? 'active' : '' ?>">
                <i class="fas fa-database"></i> Database
            </a></li>

        <?php elseif ($user_role === 'doctor'): ?>
            <li><a href="/modules/patients/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/patients/') !== false ? 'active' : '' ?>">
                <i class="fas fa-user-md"></i> Patients
            </a></li>
            <li><a href="/modules/reports/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/reports/') !== false ? 'active' : '' ?>">
                <i class="fas fa-file-medical"></i> Reports
            </a></li>

        <?php elseif ($user_role === 'nurse'): ?>
            <li><a href="/modules/patients/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/patients/') !== false ? 'active' : '' ?>">
                <i class="fas fa-procedures"></i> Ward Management
            </a></li>
            <li><a href="/modules/reports/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/reports/') !== false ? 'active' : '' ?>">
                <i class="fas fa-notes-medical"></i> Daily Reports
            </a></li>

        <?php elseif ($user_role === 'tech'): ?>
            <li><a href="/modules/maintenance/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/maintenance/') !== false ? 'active' : '' ?>">
                <i class="fas fa-tools"></i> System Maintenance
            </a></li>
            <li><a href="/modules/logs/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/logs/') !== false ? 'active' : '' ?>">
                <i class="fas fa-terminal"></i> Logs
            </a></li>

        <?php else: ?>
            <li><a href="/login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        <?php endif; ?>
    </ul>

    <div class="sidebar-footer">
        <?php if (isset($_SESSION['username'])): ?>
            <a href="/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <?php else: ?>
            <a href="/login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
        <?php endif; ?>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar" id="sidebar">
    <h2>HMIS</h2>
    <ul>
        <!-- Admin Dashboard -->
        <li><a href="/modules/admin/dashboard.php" class="<?= $current_page === 'dashboard.php' ? 'active' : '' ?>">
            <i class="fas fa-home"></i> Dashboard
        </a></li>

        <!-- Other modules -->
        <li><a href="/modules/users/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/users/') !== false ? 'active' : '' ?>">
            <i class="fas fa-users"></i> Users
        </a></li>

        <li><a href="/modules/reports/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/reports/') !== false ? 'active' : '' ?>">
            <i class="fas fa-chart-line"></i> Reports
        </a></li>

        <li><a href="/modules/settings/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/settings/') !== false ? 'active' : '' ?>">
            <i class="fas fa-cogs"></i> Settings
        </a></li>

        <li><a href="/modules/database/dashboard.php" class="<?= strpos($_SERVER['REQUEST_URI'], '/modules/database/') !== false ? 'active' : '' ?>">
            <i class="fas fa-database"></i> Database
        </a></li>
    </ul>

    <div class="sidebar-footer">
        <a href="/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

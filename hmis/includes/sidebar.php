<?php
// Sidebar navigation component

// Get the current script path (e.g. /modules/admin/dashboard.php)
$current_page = $_SERVER['PHP_SELF'];

// Helper function to check if a menu item should be active
function isActive($path) {
    global $current_page;
    return (strpos($current_page, $path) !== false) ? 'active' : '';
}
?>

<nav id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <h3>HMIS Portal</h3>
        <button id="menu-toggle" class="menu-toggle">☰</button>
    </div>

    <ul class="sidebar-menu">
        <li class="<?php echo isActive('/modules/appointments/'); ?>">
            <a href="/modules/appointments/dashboard.php"><i class="fas fa-calendar-check"></i> Appointments</a>
        </li>
        <li class="<?php echo isActive('/modules/patients/'); ?>">
            <a href="/modules/patients/dashboard.php"><i class="fas fa-users"></i> Patients</a>
        </li>
        <li class="<?php echo isActive('/modules/billing/'); ?>">
            <a href="/modules/billing/dashboard.php"><i class="fas fa-file-invoice-dollar"></i> Billing</a>
        </li>
        <li class="<?php echo isActive('/modules/laboratory/'); ?>">
            <a href="/modules/laboratory/dashboard.php"><i class="fas fa-vial"></i> Laboratory</a>
        </li>
        <li class="<?php echo isActive('/modules/radiology/'); ?>">
            <a href="/modules/radiology/dashboard.php"><i class="fas fa-x-ray"></i> Radiology</a>
        </li>
        <li class="<?php echo isActive('/modules/pharmacy/'); ?>">
            <a href="/modules/pharmacy/dashboard.php"><i class="fas fa-pills"></i> Pharmacy</a>
        </li>
        
        <li class="<?php echo isActive('/modules/reports/'); ?>">
            <a href="/modules/reports/dashboard.php"><i class="fas fa-chart-line"></i> Reports</a>
        </li>
        <li class="<?php echo isActive('/modules/admin/'); ?>">
            <a href="/modules/admin/dashboard.php"><i class="fas fa-user-shield"></i> Admin</a>
        </li>
        
    </ul>

    <div class="sidebar-footer">
        <a href="/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</nav>

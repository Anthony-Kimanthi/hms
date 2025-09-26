<?php
// Get current page name (without query string)
$current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>

<!-- Include Font Awesome CDN in your <head> of every page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="sidebar">
    <h2>Modules</h2>
    <ul>
        <li>
            <a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-hospital"></i> Home
            </a>
        </li>
        <li>
            <a href="patients.php" class="<?= $current_page == 'patients.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-user-injured"></i> Patients
            </a>
        </li>
        <li>
            <a href="doctors.php" class="<?= $current_page == 'doctors.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-user-doctor"></i> Doctors
            </a>
        </li>
        <li>
            <a href="billing.php" class="<?= $current_page == 'billing.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-credit-card"></i> Billing
            </a>
        </li>
        <li>
            <a href="triage.php" class="<?= $current_page == 'triage.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-user-nurse"></i> Triage
            </a>
        </li>
        <li>
            <a href="pharmacy.php" class="<?= $current_page == 'pharmacy.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-pills"></i> Pharmacy
            </a>
        </li>
        <li>
            <a href="lab.php" class="<?= $current_page == 'lab.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-flask-vial"></i> Lab
            </a>
        </li>
        <li>
            <a href="radiology.php" class="<?= $current_page == 'radiology.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-x-ray"></i> Radiology
            </a>
        </li>
        <li>
            <a href="reports.php" class="<?= $current_page == 'reports.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-file-medical"></i> Reports
            </a>
        </li>
        <li>
            <a href="admin.php" class="<?= $current_page == 'admin.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-gear"></i> Admin
            </a>
        </li>
    </ul>
</div>

<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar" id="sidebar">
    <h2>Modules</h2>
    <ul>
        <li><a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>"><i class="fa-solid fa-hospital"></i> Home</a></li>
        <li><a href="/hmis/modules/patients.php" class="<?= $current_page == 'patients.php' ? 'active' : '' ?>"><i class="fa-solid fa-user-injured"></i> Patients</a></li>
        <li><a href="/hmis/modules/doctors.php" class="<?= $current_page == 'doctors.php' ? 'active' : '' ?>"><i class="fa-solid fa-user-doctor"></i> Doctors</a></li>
        <li><a href="/hmis/modules/billing.php" class="<?= $current_page == 'billing.php' ? 'active' : '' ?>"><i class="fa-solid fa-credit-card"></i> Billing</a></li>
        <li><a href="/hmis/modules/triage.php" class="<?= $current_page == 'triage.php' ? 'active' : '' ?>"><i class="fa-solid fa-user-nurse"></i> Triage</a></li>
        <li><a href="/hmis/modules/pharmacy.php" class="<?= $current_page == 'pharmacy.php' ? 'active' : '' ?>"><i class="fa-solid fa-pills"></i> Pharmacy</a></li>
        <li><a href="/hmis/modules/lab.php" class="<?= $current_page == 'lab.php' ? 'active' : '' ?>"><i class="fa-solid fa-flask-vial"></i> Lab</a></li>
        <li><a href="/hmis/modules/radiology.php" class="<?= $current_page == 'radiology.php' ? 'active' : '' ?>"><i class="fa-solid fa-x-ray"></i> Radiology</a></li>
        <li><a href="/hmis/modules/reports.php" class="<?= $current_page == 'reports.php' ? 'active' : '' ?>"><i class="fa-solid fa-file-medical"></i> Reports</a></li>
        <li><a href="/modules/admin.php" class="<?= $current_page == 'admin.php' ? 'active' : '' ?>"><i class="fa-solid fa-gear"></i> Admin</a></li>
    </ul>
</div>

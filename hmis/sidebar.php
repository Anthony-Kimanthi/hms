<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
    <h2>Modules</h2>
    <ul>
        <li><a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">🏥Home</a></li>
        <li><a href="patients.php" class="<?= $current_page == 'patients.php' ? 'active' : '' ?>">👤Patients</a></li>
        <li><a href="doctors.php" class="<?= $current_page == 'doctors.php' ? 'active' : '' ?>">Doctors</a></li>
        <li><a href="billing.php" class="<?= $current_page == 'billing.php' ? 'active' : '' ?>">💳Billing</a></li>
        <li><a href="triage.php" class="<?= $current_page == 'triage.php' ? 'active' : '' ?>">🧑‍⚕️Triage</a></li>
        <li><a href="pharmacy.php" class="<?= $current_page == 'pharmacy.php' ? 'active' : '' ?>">💊Pharmacy</a></li>
        <li><a href="lab.php" class="<?= $current_page == 'lab.php' ? 'active' : '' ?>">Lab</a></li>
        <li><a href="radiology.php" class="<?= $current_page == 'radiology.php' ? 'active' : '' ?>">Radiology</a></li>
        <li><a href="reports.php" class="<?= $current_page == 'reports.php' ? 'active' : '' ?>">Reports</a></li>
        <li><a href="admin.php" class="<?= $current_page == 'admin.php' ? 'active' : '' ?>">Admin</a></li>
    </ul>
</div>

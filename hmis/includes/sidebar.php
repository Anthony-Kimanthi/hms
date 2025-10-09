<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['role'] ?? '';
?>
<div class="sidebar" id="sidebar">
    <h2>Modules</h2>
    <ul>
        <!-- Home (visible to all) -->
        <li>
            <a href="/hmis/index.php" class="<?= $current_page === 'index.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-house"></i> Home
            </a>
        </li>

        <?php if ($role === 'admin'): ?>
            <li><a href="/hmis/modules/patients/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'patients') !== false ? 'active' : '' ?>"><i class="fa-solid fa-hospital-user"></i> Patients</a></li>
            <li><a href="/hmis/modules/doctors/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'doctors') !== false ? 'active' : '' ?>"><i class="fa-solid fa-user-doctor"></i> Doctors</a></li>
            <li><a href="/hmis/modules/billing/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'billing') !== false ? 'active' : '' ?>"><i class="fa-solid fa-file-invoice-dollar"></i> Billing</a></li>
            <li><a href="/hmis/modules/triage/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'triage') !== false ? 'active' : '' ?>"><i class="fa-solid fa-user-nurse"></i> Triage</a></li>
            <li><a href="/hmis/modules/pharmacy/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'pharmacy') !== false ? 'active' : '' ?>"><i class="fa-solid fa-prescription-bottle-medical"></i> Pharmacy</a></li>
            <li><a href="/hmis/modules/lab/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'lab') !== false ? 'active' : '' ?>"><i class="fa-solid fa-flask-vial"></i> Lab</a></li>
            <li><a href="/hmis/modules/radiology/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'radiology') !== false ? 'active' : '' ?>"><i class="fa-solid fa-x-ray"></i> Radiology</a></li>
            <li><a href="/hmis/modules/reports/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'reports') !== false ? 'active' : '' ?>"><i class="fa-solid fa-file-medical"></i> Reports</a></li>
            <li><a href="/hmis/modules/admin/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'admin') !== false ? 'active' : '' ?>"><i class="fa-solid fa-gear"></i> Admin</a></li>

        <?php elseif ($role === 'doctor'): ?>
            <li><a href="/hmis/modules/patients/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'patients') !== false ? 'active' : '' ?>"><i class="fa-solid fa-hospital-user"></i> Patients</a></li>
            <li><a href="/hmis/modules/reports/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'reports') !== false ? 'active' : '' ?>"><i class="fa-solid fa-file-waveform"></i> Reports</a></li>

        <?php elseif ($role === 'nurse'): ?>
            <li><a href="/hmis/modules/triage/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'triage') !== false ? 'active' : '' ?>"><i class="fa-solid fa-user-nurse"></i> Triage</a></li>
            <li><a href="/hmis/modules/patients/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'patients') !== false ? 'active' : '' ?>"><i class="fa-solid fa-hospital-user"></i> Patients</a></li>

        <?php elseif ($role === 'lab'): ?>
            <li><a href="/hmis/modules/lab/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'lab') !== false ? 'active' : '' ?>"><i class="fa-solid fa-vials"></i> Lab</a></li>
            <li><a href="/hmis/modules/reports/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'reports') !== false ? 'active' : '' ?>"><i class="fa-solid fa-file-waveform"></i> Reports</a></li>

        <?php elseif ($role === 'pharmacy'): ?>
            <li><a href="/hmis/modules/pharmacy/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'pharmacy') !== false ? 'active' : '' ?>"><i class="fa-solid fa-pills"></i> Pharmacy</a></li>
            <li><a href="/hmis/modules/reports/dashboard.php" class="<?= strpos($_SERVER['PHP_SELF'], 'reports') !== false ? 'active' : '' ?>"><i class="fa-solid fa-file-waveform"></i> Reports</a></li>
        <?php endif; ?>
    </ul>

    <!-- Logout pinned at bottom -->
    <div class="sidebar-footer">
        <a href="/hmis/auth/logout.php">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </div>
</div>

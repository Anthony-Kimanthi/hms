<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar" id="sidebar">
    <h2>Modules</h2>
    <ul>
        <!-- Home: always visible -->
        <li>
            <a href="/home.php" class="<?= $current_page == 'home.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-hospital"></i> Home
            </a>
        </li>

        <?php if ($_SESSION['role'] === 'admin'): ?>
            <li>
                <a href="/modules/admin/dashboard.php" class="<?= $current_page == 'dashboard.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-gear"></i> Admin Dashboard
                </a>
            </li>
            <li>
                <a href="/modules/reports.php" class="<?= $current_page == 'reports.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-file-medical"></i> Reports
                </a>
            </li>
        <?php endif; ?>

        <?php if ($_SESSION['role'] === 'doctor'): ?>
            <li>
                <a href="/modules/doctor/dashboard.php" class="<?= $current_page == 'dashboard.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-user-doctor"></i> Doctor Dashboard
                </a>
            </li>
            <li>
                <a href="/modules/patients.php" class="<?= $current_page == 'patients.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-user-injured"></i> Patients
                </a>
            </li>
        <?php endif; ?>

        <?php if ($_SESSION['role'] === 'nurse'): ?>
            <li>
                <a href="/modules/nurse/dashboard.php" class="<?= $current_page == 'dashboard.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-user-nurse"></i> Nurse Dashboard
                </a>
            </li>
            <li>
                <a href="/modules/triage.php" class="<?= $current_page == 'triage.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-stethoscope"></i> Triage
                </a>
            </li>
        <?php endif; ?>

        <?php if ($_SESSION['role'] === 'lab'): ?>
            <li>
                <a href="/modules/lab/dashboard.php" class="<?= $current_page == 'dashboard.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-flask-vial"></i> Lab Dashboard
                </a>
            </li>
        <?php endif; ?>

        <?php if ($_SESSION['role'] === 'pharmacy'): ?>
            <li>
                <a href="/modules/pharmacy/dashboard.php" class="<?= $current_page == 'dashboard.php' ? 'active' : '' ?>">
                    <i class="fa-solid fa-pills"></i> Pharmacy Dashboard
                </a>
            </li>
        <?php endif; ?>
    </ul>

    <!-- Logout always visible -->
    <div class="logout">
        <a href="/auth/logout.php">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </div>
</div>

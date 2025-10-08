<?php
require_once __DIR__ . '/../../auth_check.php';
checkRole(['admin']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | HMIS</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <?php include __DIR__ . '/../../includes/sidebar.php'; ?>

    <main class="content">
        <header>
            <h1>Admin Dashboard</h1>
            <div class="user-info">
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span> |
                <a href="../../logout.php">Logout</a>
            </div>
        </header>

        <section class="dashboard-cards">
            <div class="card">
                <h2>System Overview</h2>
                <p>You are logged in as <strong><?php echo htmlspecialchars($_SESSION['role']); ?></strong>.</p>
            </div>

            <div class="card">
                <h2>Quick Stats</h2>
                <ul>
                    <li>Total Users: <em>--</em></li>
                    <li>Active Sessions: <em>--</em></li>
                    <li>Server Time: <em><?php echo date('l, d M Y H:i'); ?></em></li>
                </ul>
            </div>
        </section>
    </main>
</body>
</html>

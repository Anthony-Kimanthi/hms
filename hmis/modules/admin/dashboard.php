<?php
require_once __DIR__ . '/../../auth_check.php';

// Allow only admin users
checkRole(['admin']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | HMIS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        header {
            background: #0057b8;
            color: white;
            padding: 15px 20px;
        }
        header h1 {
            margin: 0;
            font-size: 20px;
        }
        nav {
            background: #003f8a;
            padding: 10px;
        }
        nav a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 15px 20px;
            margin-bottom: 20px;
        }
        .logout {
            float: right;
            color: #ffdddd;
        }
    </style>
</head>
<body>
    <header>
        <h1>HMIS Admin Dashboard 
            <span class="logout">
                <a href="../../logout.php" style="color:white;">Logout</a>
            </span>
        </h1>
    </header>

    <nav>
        <a href="#">Overview</a>
        <a href="#">Manage Users</a>
        <a href="#">Reports</a>
        <a href="#">System Settings</a>
    </nav>

    <main>
        <div class="card">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
            <p>You are logged in as <strong><?php echo htmlspecialchars($_SESSION['role']); ?></strong>.</p>
        </div>
        
        <div class="card">
            <h3>Quick Stats</h3>
            <ul>
                <li>Total Users: <em>-- (coming soon)</em></li>
                <li>Active Sessions: <em>--</em></li>
                <li>System Uptime: <em><?php echo date('l, d M Y H:i'); ?></em></li>
            </ul>
        </div>

        <div class="card">
            <h3>Next Steps</h3>
            <p>Use the links above to manage your hospital data modules. More features will be added soon.</p>
        </div>
    </main>
</body>
</html>

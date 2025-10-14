<?php
// include('../includes/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Center Module | HMIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary: #0a6ebd;
            --accent: #00b894;
            --bg: #f5f8fa;
            --text-dark: #2d3436;
            --text-light: #636e72;
            --card-bg: #fff;
        }

        * {
            box-sizing: border-box;
            font-family: "Segoe UI", Roboto, sans-serif;
        }

        body {
            margin: 0;
            background: var(--bg);
        }

        /* Top Navigation */
        nav {
            background: var(--primary);
            color: white;
            display: flex;
            align-items: left;
            justify-content: space-between;
            padding: 15px 40px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        nav h2 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 0.5px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Main Container */
        .container {
            max-width: 1000px;
            margin: 60px auto;
            padding: 20px;
        }

        .module-card {
            background: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 40px;
            text-align: center;
        }

        .module-card h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .module-card p {
            color: var(--text-light);
            font-size: 15px;
            margin-bottom: 30px;
        }

        .actions {
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            margin: 8px;
            padding: 12px 26px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #094c84;
        }

        .btn-accent {
            background: var(--accent);
            color: white;
        }

        .btn-accent:hover {
            background: #00976f;
        }

        /* Search Section */
        .search-section {
            margin-top: 40px;
        }

        .search-box {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .search-box input[type="text"] {
            width: 60%;
            padding: 12px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.2s;
        }

        .search-box input[type="text"]:focus {
            border-color: var(--primary);
        }

        .search-box button {
            padding: 12px 24px;
            background: var(--primary);
            border: none;
            color: white;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .search-box button:hover {
            background: #094c84;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 60px;
            color: var(--text-light);
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <nav>
        <h2>🏥 HMIS</h2>
        <div>
            <a href="../index.php">Home</a>
            <a href="patients.php" style="font-weight:600;">Patients</a>
            <a href="../modules/reports.php">Reports</a>
            <a href="../logout.php">Logout</a>
        </div>
    </nav>

    <!-- Patient Center -->
    <div class="container">
        <div class="module-card">
            <h1>Patient Center Module</h1>
            <p>Manage all patient-related records from one central location.</p>

            <div class="actions">
                <a href="patients/add_edit.php" class="btn btn-primary">+ Register New Patient</a>
                <a href="patients/search.php" class="btn btn-accent">Search Existing Patients</a>
            </div>

            <div class="search-section">
                <form class="search-box" action="patients/search.php" method="GET">
                    <input type="text" name="query" placeholder="Search patient by name, ID, or DOB..." required>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <footer>
            <p>© <?php echo date('Y'); ?> HMIS System. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>

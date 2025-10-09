<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Access Denied</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .unauthorized-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            background-color: #f8f9fa;
            text-align: center;
        }

        .unauthorized-box {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 40px 50px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .unauthorized-box h2 {
            color: #E74C3C;
            margin-bottom: 15px;
        }

        .unauthorized-box p {
            color: #555;
            font-size: 1.1em;
            margin-bottom: 25px;
        }

        .unauthorized-box a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1ABC9C;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .unauthorized-box a:hover {
            background-color: #16A085;
        }
    </style>
</head>
<body>

    <div class="unauthorized-container">
        <div class="unauthorized-box">
            <h2>🚫 Access Denied</h2>
            <p>You do not have permission to view this page.</p>

            <?php if (isset($_SESSION['username'])): ?>
                <a href="/logout.php">Logout</a>
            <?php else: ?>
                <a href="/login.php">Return to Login</a>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>

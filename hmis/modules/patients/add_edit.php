<?php
$pageTitle = "Add / Edit Patient";
$pageHeader = "Patient Registration";
$pageDescription = "Register a new patient or update existing details.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> - HMIS</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .form-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            max-width: 700px;
            margin: 2rem auto;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        form label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 1rem;
        }

        button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        }

        button:hover {
            background: #0056b3;
        }

        .back-btn {
            background: #6c757d;
            margin-left: 10px;
        }

        .back-btn:hover {
            background: #565e64;
        }
    </style>
</head>
<body>
    <?php include '../../includes/sidebar.php'; ?>
    <?php include '../../includes/header.php'; ?>

    <div class="form-container">
        <h2><i class="fa-solid fa-user-plus"></i> <?= $pageHeader ?></h2>
        <p><?= $pageDescription ?></p>

        <form action="save_patient.php" method="POST">
            <label>Full Name</label>
            <input type="text" name="fullname" required>

            <label>Gender</label>
            <select name="gender" required>
                <option value="">-- Select Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label>Age</label>
            <input type="number" name="age" min="0" required>

            <label>Phone</label>
            <input type="text" name="phone" required>

            <label>Address</label>
            <input type="text" name="address">

            <button type="submit"><i class="fa-solid fa-save"></i> Save</button>
            <a href="dashboard.php" class="back-btn">Cancel</a>
        </form>
    </div>
</body>
</html>

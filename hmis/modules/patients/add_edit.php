<?php
require_once '../../config/db.php';

$pageTitle = "Add / Edit Patient";
$pageHeader = "Patient Registration";
$editing = isset($_GET['id']); // check if editing

// Initialize variables
$id = $fullname = $gender = $age = $phone = $address = "";

// If editing, fetch patient details
if ($editing) {
    $stmt = $pdo->prepare("SELECT * FROM patients WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $patient = $stmt->fetch();

    if ($patient) {
        $id = $patient['id'];
        $fullname = $patient['fullname'];
        $gender = $patient['gender'];
        $age = $patient['age'];
        $phone = $patient['phone'];
        $address = $patient['address'];
    } else {
        die("Patient not found.");
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($editing) {
        $stmt = $pdo->prepare("UPDATE patients SET fullname=?, gender=?, age=?, phone=?, address=? WHERE id=?");
        $stmt->execute([$fullname, $gender, $age, $phone, $address, $id]);
        header("Location: dashboard.php?success=updated");
        exit;
    } else {
        $stmt = $pdo->prepare("INSERT INTO patients (fullname, gender, age, phone, address, date_registered) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$fullname, $gender, $age, $phone, $address]);
        header("Location: dashboard.php?success=added");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> - HMIS</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f8;
            margin: 0;
            display: flex;
        }

        .content {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            margin-bottom: 1rem;
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }

        .btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn:hover {
            background: #0056b3;
        }

        .btn-cancel {
            background: #6c757d;
            text-decoration: none;
            color: #fff;
            padding: 10px 18px;
            border-radius: 6px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <?php include '../../includes/sidebar.php'; ?>

    <div class="content">
        <h1><i class="fa-solid fa-user-plus"></i> <?= $editing ? "Edit Patient" : "Register New Patient" ?></h1>

        <form method="POST">
            <label>Full Name</label>
            <input type="text" name="fullname" value="<?= htmlspecialchars($fullname) ?>" required>

            <label>Gender</label>
            <select name="gender" required>
                <option value="">-- Select --</option>
                <option value="Male" <?= $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= $gender == 'Female' ? 'selected' : '' ?>>Female</option>
            </select>

            <label>Age</label>
            <input type="number" name="age" value="<?= htmlspecialchars($age) ?>" required>

            <label>Phone</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($phone) ?>" required>

            <label>Address</label>
            <input type="text" name="address" value="<?= htmlspecialchars($address) ?>" required>

            <button type="submit" class="btn"><?= $editing ? "Update Patient" : "Save Patient" ?></button>
            <a href="dashboard.php" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>

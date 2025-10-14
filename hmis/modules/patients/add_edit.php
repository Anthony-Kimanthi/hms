<?php
require_once '../../config/db.php';

$pageTitle = "Add / Edit Patient";
$pageHeader = "Patient Registration";
$editing = isset($_GET['id']);

$id = $title = $first_name = $second_name = $last_name = $date_of_birth = "";

if ($editing) {
    $stmt = $pdo->prepare("SELECT * FROM patient_details WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $patient = $stmt->fetch();

    if ($patient) {
        $id = $patient['id'];
        $title = $patient['title'];
        $first_name = $patient['first_name'];
        $second_name = $patient['second_name'];
        $last_name = $patient['last_name'];
        $date_of_birth = $patient['date_of_birth'];
    } else {
        die("Patient not found.");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'] ?: null;
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];

    if ($editing) {
        $stmt = $pdo->prepare("UPDATE patient_details 
            SET title=?, first_name=?, second_name=?, last_name=?, date_of_birth=? 
            WHERE id=?");
        $stmt->execute([$title, $first_name, $second_name, $last_name, $date_of_birth, $id]);
        header("Location: dashboard.php?success=updated");
        exit;
    } else {
        $stmt = $pdo->prepare("INSERT INTO patient_details (title, first_name, second_name, last_name, date_of_birth)
            VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $first_name, $second_name, $last_name, $date_of_birth, $age]);
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

        .age-field {
            background: #e9ecef;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <?php include '../../includes/sidebar.php'; ?>

    <div class="content">
        <h1><i class="fa-solid fa-user-plus"></i> <?= $editing ? "Edit Patient" : "Register New Patient" ?></h1>

        <form method="POST">
            <label>Title</label>
            <select name="title" required>
                <option value="">-- Select --</option>
                <?php
                $titles = ['Mr', 'Mrs', 'Ms', 'Hon', 'Baby'];
                foreach ($titles as $t) {
                    $selected = $title === $t ? 'selected' : '';
                    echo "<option value='$t' $selected>$t</option>";
                }
                ?>
            </select>

            <label>First Name</label>
            <input type="text" name="first_name" value="<?= htmlspecialchars($first_name) ?>" required>

            <label>Second Name</label>
            <input type="text" name="second_name" value="<?= htmlspecialchars($second_name) ?>">

            <label>Last Name</label>
            <input type="text" name="last_name" value="<?= htmlspecialchars($last_name) ?>" required>

            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" id="dob" value="<?= htmlspecialchars($date_of_birth) ?>" required>

            <label>Age</label>
            <input type="text" id="age" class="age-field" readonly>

            <button type="submit" class="btn"><?= $editing ? "Update Patient" : "Save Patient" ?></button>
            <a href="dashboard.php" class="btn-cancel">Cancel</a>
        </form>
    </div>

    <script>
        const dobInput = document.getElementById('dob');
        const ageField = document.getElementById('age');

        function calculateAge(dob) {
            const birthDate = new Date(dob);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        dobInput.addEventListener('change', () => {
            const dob = dobInput.value;
            if (dob) {
                ageField.value = calculateAge(dob);
            } else {
                ageField.value = '';
            }
        });

        // Auto-fill age on load if DOB is present (edit mode)
        if (dobInput.value) {
            ageField.value = calculateAge(dobInput.value);
        }
    </script>
</body>
</html>

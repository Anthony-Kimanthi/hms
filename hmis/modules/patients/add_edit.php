<?php
require_once '../../config/db.php'; // PDO connection

$success = false;
$error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $first_name = trim($_POST['first_name']);
    $second_name = trim($_POST['second_name'] ?? '');
    $last_name = trim($_POST['last_name']);
    $date_of_birth = $_POST['date_of_birth'];

    // Calculate age
    try {
        $dob = new DateTime($date_of_birth);
        $today = new DateTime();
        $age = $today->diff($dob)->y;
    } catch (Exception $e) {
        $error = "Invalid date format.";
    }

    if (!$error) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO patient_details (title, first_name, second_name, last_name, date_of_birth, age)
                VALUES (?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([$title, $first_name, $second_name, $last_name, $date_of_birth, $age]);

            header("Location: ../patients.php?success=1");
            exit;
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Patient - HMIS</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f8;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px;
        }
        .form-container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            width: 500px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form label {
            font-weight: 600;
            display: block;
            margin: 10px 0 5px;
        }
        select, input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[readonly] {
            background: #f8f9fa;
        }
        .btn {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .error {
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2><i class="fa-solid fa-user-plus"></i> Register New Patient</h2>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="title">Title</label>
            <select name="title" id="title" required>
                <option value="">-- Select Title --</option>
                <option>Mr</option>
                <option>Mrs</option>
                <option>Ms</option>
                <option>Hon</option>
                <option>Baby</option>
            </select>

            <label for="first_name">First Name *</label>
            <input type="text" name="first_name" id="first_name" required>

            <label for="second_name">Second Name</label>
            <input type="text" name="second_name" id="second_name">

            <label for="last_name">Last Name *</label>
            <input type="text" name="last_name" id="last_name" required>

            <label for="date_of_birth">Date of Birth *</label>
            <input type="date" name="date_of_birth" id="date_of_birth" required onchange="calculateAge()">

            <label for="age">Age</label>
            <input type="text" id="age" name="age_display" readonly>

            <button type="submit" class="btn">Save Patient</button>
        </form>
    </div>

    <script>
        function calculateAge() {
            const dob = document.getElementById('date_of_birth').value;
            if (dob) {
                const birthDate = new Date(dob);
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                document.getElementById('age').value = age;
            }
        }
    </script>
</body>
</html>

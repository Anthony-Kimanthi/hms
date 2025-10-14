<?php
require_once '../../config/db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'] ?? null;
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];

    // Calculate age in PHP
    $age = date_diff(date_create($date_of_birth), date_create('today'))->y;

    try {
        $stmt = $pdo->prepare("
            INSERT INTO patient_details (title, first_name, second_name, last_name, date_of_birth, age)
            VALUES (:title, :first_name, :second_name, :last_name, :date_of_birth, :age)
        ");
        $stmt->execute([
            ':title' => $title,
            ':first_name' => $first_name,
            ':second_name' => $second_name,
            ':last_name' => $last_name,
            ':date_of_birth' => $date_of_birth,
            ':age' => $age
        ]);

        echo "<p style='color: green;'>✅ Patient added successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add / Edit Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        form {
            max-width: 500px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
        }
        button {
            margin-top: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .age-display {
            font-weight: bold;
            color: green;
        }
    </style>
    <script>
        function calculateAge() {
            const dob = document.getElementById('date_of_birth').value;
            if (!dob) return;
            const dobDate = new Date(dob);
            const today = new Date();
            let age = today.getFullYear() - dobDate.getFullYear();
            const m = today.getMonth() - dobDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dobDate.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
            document.getElementById('ageDisplay').innerText = age + " years";
        }
    </script>
</head>
<body>

<h2>🧍 Add / Edit Patient</h2>

<form method="POST" action="">
    <label for="title">Title</label>
    <select name="title" required>
        <option value="">-- Select --</option>
        <option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Ms">Ms</option>
        <option value="Hon">Hon</option>
        <option value="Baby">Baby</option>
    </select>

    <label for="first_name">First Name *</label>
    <input type="text" name="first_name" required>

    <label for="second_name">Second Name</label>
    <input type="text" name="second_name">

    <label for="last_name">Last Name *</label>
    <input type="text" name="last_name" required>

    <label for="date_of_birth">Date of Birth *</label>
    <input type="date" id="date_of_birth" name="date_of_birth" onchange="calculateAge()" required>

    <label for="age">Age (Auto)</label>
    <input type="text" id="age" name="age_display" readonly>
    <div id="ageDisplay" class="age-display"></div>

    <button type="submit">💾 Save Patient</button>
</form>

</body>
</html>

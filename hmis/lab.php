<?php $activePage = 'lab'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab - InfiHealth</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-content">
        <h1>Lab Module</h1>
        <p>Welcome to the Lab section. Here you’ll manage lab tests, results, and reports.</p>

        <!-- Example placeholder form -->
        <form action="" method="post" class="module-form">
            <label for="test_name">Test Name:</label>
            <input type="text" id="test_name" name="test_name" required>

            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" required>

            <label for="result">Result:</label>
            <textarea id="result" name="result"></textarea>

            <button type="submit">Save Result</button>
        </form>
    </div>
</body>
</html>

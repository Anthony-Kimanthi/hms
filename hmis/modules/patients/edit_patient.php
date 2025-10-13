<?php
require_once '../../config/db.php';

if (!isset($_GET['id'])) {
    die("Missing patient ID.");
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM patients WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$patient = $result->fetch_assoc();

if (!$patient) die("Patient not found.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Patient</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <?php include '../../includes/sidebar.php'; ?>
    <div class="form-container">
        <h2>Edit Patient</h2>
        <form action="update_patient.php" method="POST">
            <input type="hidden" name="id" value="<?= $patient['id'] ?>">
            <label>Full Name</label>
            <input type="text" name="fullname" value="<?= htmlspecialchars($patient['fullname']) ?>" required>

            <label>Gender</label>
            <select name="gender" required>
                <option value="Male" <?= $patient['gender']=='Male'?'selected':'' ?>>Male</option>
                <option value="Female" <?= $patient['gender']=='Female'?'selected':'' ?>>Female</option>
            </select>

            <label>Age</label>
            <input type="number" name="age" value="<?= htmlspecialchars($patient['age']) ?>" required>

            <label>Phone</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($patient['phone']) ?>" required>

            <label>Address</label>
            <input type="text" name="address" value="<?= htmlspecialchars($patient['address']) ?>">

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

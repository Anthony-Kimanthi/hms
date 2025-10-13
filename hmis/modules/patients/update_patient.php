<?php
require_once '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE patients SET fullname=?, gender=?, age=?, phone=?, address=? WHERE id=?");
    $stmt->bind_param("ssissi", $fullname, $gender, $age, $phone, $address, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php?success=1");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

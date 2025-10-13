<?php
require_once '../../config/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM patients WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php?success=1");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Missing patient ID.";
}
?>

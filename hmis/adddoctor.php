<?php
include 'db.php'; // include the connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $age            = $_POST['age'];
    $specialization = $_POST['specialization'];
    $timings        = $_POST['timings'];

    $stmt = $conn->prepare("INSERT INTO doctorslist (firstname, lastname, age, specialization, timings) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $firstname, $lastname, $age, $specialization, $timings);

    if ($stmt->execute()) {
        header("Location: doctors.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


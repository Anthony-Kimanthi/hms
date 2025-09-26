<?php
// Database connection settings (Docker Compose credentials)
$db_host = "db";             // Service name from docker-compose.yml
$db_username = "hmis_user";  // MySQL user
$db_pass = "hmis_pass";      // MySQL password
$db_name = "hmis_db";        // Database name

// Create connection
$conn = new mysqli($db_host, $db_username, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $age            = $_POST['age'];
    $specialization = $_POST['specialization'];
    $timings        = $_POST['timings'];

    // Use prepared statements (prevents SQL injection)
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

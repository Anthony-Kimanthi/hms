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
    die("Database connection failed: " . $conn->connect_error);
}
?>

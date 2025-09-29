<?php
$host = "db";          // service name from docker-compose.yml
$user = "hmis_user";   // set in environment
$pass = "hmis_pass";   // set in environment
$dbname = "hmis_db";   // set in environment

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

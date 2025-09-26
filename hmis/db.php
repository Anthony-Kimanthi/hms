<?php
$host = "mysql"; // use "mysql" if connecting via Docker service name, otherwise "localhost"
$user = "root";
$pass = "yourpassword"; // match docker-compose.yml MYSQL_ROOT_PASSWORD
$db   = "hmsdb";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

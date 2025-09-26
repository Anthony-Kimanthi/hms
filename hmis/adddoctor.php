<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $age            = $_POST['age'];
    $specialization = $_POST['specialization'];
    $timings        = $_POST['timings'];

    $query = "INSERT INTO doctorslist (firstname, lastname, age, specialization, timings)
              VALUES ('$firstname', '$lastname', '$age', '$specialization', '$timings')";

    if (mysqli_query($conn, $query)) {
        // redirect to doctors list on success
        header("Location: doctors.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Doctor - Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body id="body">
<div id='cssmenu'>
    <ul>
       <li><a href='index.php'>Home</a></li>
       <li><a href='about.php'>About</a></li>
       <li><a href='doctors.php'>Doctors</a></li>
       <li><a href='patients.php'>Patients</a></li>
    </ul>
</div>
</body>
</html>

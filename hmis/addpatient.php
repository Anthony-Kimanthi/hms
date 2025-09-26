<?php
// db.php already has the connection logic, so let’s use it
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name   = $_POST['name'];
    $gender = $_POST['gender'];
    $age    = $_POST['age'];
    $mobile = $_POST['mobile'];
    $email  = $_POST['email'];
    $address= $_POST['address'];

    $query = "INSERT INTO addpatient (name, gender, age, mobile, email, address)
              VALUES ('$name', '$gender', '$age', '$mobile', '$email', '$address')";

    if (mysqli_query($conn, $query)) {
        // Redirect to patients list after success
        header("Location: patients.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management System</title>
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

<?php
include 'db.php'; // include the connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $gender  = $_POST['gender'];
    $age     = $_POST['age'];
    $mobile  = $_POST['mobile'];
    $email   = $_POST['email'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO addpatient (name, gender, age, mobile, email, address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $name, $gender, $age, $mobile, $email, $address);

    if ($stmt->execute()) {
        $message = "Patient added successfully.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management System</title>
    <!--Favicon-->
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>
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

<div class="container">
    <h3><?php echo isset($message) ? $message : "Fill the form to add a patient."; ?></h3>
</div>

</body>
</html>


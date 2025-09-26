<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management System - Patients</title>
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
       <li class='active'><a href='patients.php'>Patients</a></li>
       <label class="heading">Hospital management system</label>
    </ul>
</div>

<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM addpatient");

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<table class='table table-striped'>
 <thead>
      <tr>
        <th>ID</th

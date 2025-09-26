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
        <th>ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['mobile'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "</tr>";
}

echo "</tbody></table>";
?>

<center>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Add a new patient
    </button>
</center>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a patient</h4>
      </div>
      <div class="modal-body">
         <form role="form" method="post" action="addpatient.php" class="addform">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter the name" required>
            </div>
            <div class="form-group">
                <select class="form-control" name="gender" required>
                    <option value="">Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="age" placeholder="Enter the age" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="mobile" placeholder="Enter the mobile number" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter the email" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="address" placeholder="Enter the address" required></textarea>
            </div>
            <center><button type="submit" class="btn btn-primary">Submit</button></center>
         </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>

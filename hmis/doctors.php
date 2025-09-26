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
       <li class='active'><a href='doctors.php'>Doctors</a></li>
       <li><a href='patients.php'>Patients</a></li>
       <label class="heading">Hospital management system</label>
    </ul>
</div>

<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM doctorslist");

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<table class='table table-striped'>
 <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Specialization</th>
        <th>Timings</th>
      </tr>
    </thead>
    <tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['specialization'] . "</td>";
    echo "<td>" . $row['timings'] . "</td>";
    echo "</tr>";
}

echo "</tbody></table>";
?>

<center>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Add a new doctor
    </button>
</center>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a doctor</h4>
      </div>
      <div class="modal-body">
         <form role="form" method="post" action="adddoctor.php" class="addform">
            <div class="form-group">
                <input type="text" class="form-control" name="firstname" placeholder="Enter the first name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="lastname" placeholder="Enter the last name" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="age" placeholder="Enter the age" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="specialization" placeholder="Enter the specialization" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="timings" placeholder="Enter the visiting hours" required>
            </div>
            <center><button type="submit" class="btn btn-primary">Submit</button></center>
         </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $age            = $_POST['age'];
    $specialization = $_POST['specialization'];

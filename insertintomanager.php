<?php
//include 'partials/nav.php';
//include 'adminhomepage.php';


$servername = "localhost";
$username = "root";
$password = "";
$database = "cwh_project";

// Establish connection
$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['insertperform'])) {
    $complaint_id = $_POST['complaint_id'];
    $manager_name = $_POST['manager_id'];

    // Insert data into manager_complaints table
    $sql = "INSERT INTO manager_complaints (cno1,name) VALUES ('$complaint_id', '$manager_name')";
    if (mysqli_query($con, $sql)) {
        // echo "Record added successfully.";
include 'allcomplaints.php';
        // exit;

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>
<?php
session_start();
include 'partials/nav.php';
include 'adminhomepage.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "cwh_project";
$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch counts
$totalComplaints = mysqli_num_rows(mysqli_query($con, "SELECT * FROM complaint"));
$solvedComplaints = mysqli_num_rows(mysqli_query($con, "SELECT * FROM complaint WHERE status='solved'"));
$unsolvedComplaints = mysqli_num_rows(mysqli_query($con, "SELECT * FROM complaint WHERE status='unsolved'"));
$ongoingComplaints = mysqli_num_rows(mysqli_query($con, "SELECT * FROM complaint WHERE status='ongoing'"));
$totalUsers = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users"));
$totalManagers = mysqli_num_rows(mysqli_query($con, "SELECT * FROM manager"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Complaint Management System - Dashboard</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="styles/admin_dashbaord.css">

<style>
   
  </style>
</head>
<body>
  <div class="col-md-9 py-4" id="all">
    <h2 class="text-center mb-4">Welcome to Complaint Management Dashboard</h2><br>

    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Complaints</h5>
            <div class="card-text"><?php echo $totalComplaints; ?></div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Resolved Complaints</h5>
            <div class="card-text"><?php echo $solvedComplaints; ?></div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Unresolved Complaints</h5>
            <div class="card-text"><?php echo $unsolvedComplaints; ?></div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ongoing Complaints</h5>
            <div class="card-text"><?php echo $ongoingComplaints; ?></div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Users</h5>
            <div class="card-text"><?php echo $totalUsers; ?></div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Managers</h5>
            <div class="card-text"><?php echo $totalManagers; ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS + jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

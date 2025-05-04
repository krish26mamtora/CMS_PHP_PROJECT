<?php
session_start();
include 'partials/nav.php';
include 'Managerhomepage.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
 #tc,#rc,#uc,#tu,#tm,#og{
      text-align:center;
      background-color:#95AAF7;
      border : 1px solid black;
      border-radius:5px;
    }
    body{
      background-color:#e6f2ff;
    }
  </style>
</head>
<body>

<div class="col-md-9 py-4" id="all">
        <h2 class="text-center mb-4">Welcome to Complaint Management Dashboard</h2><br>
        <div id="he">
        <div class="row">
    
        <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body"  id="rc">
                <h5 class="card-title">Total Complaints</h5>
                <p class="card-text"><h4>80</h4></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body"  id="rc">
                <h5 class="card-title">Total Complaints</h5>
                <p class="card-text"><h4>80</h4></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body"  id="rc">
                <h5 class="card-title">Total Complaints</h5>
                <p class="card-text"><h4>80</h4></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body"  id="rc">
                <h5 class="card-title">Total Complaints</h5>
                <p class="card-text"><h4>80</h4></p>
              </div>
            </div>
          </div>


      <!-- Add more columns or content here if needed -->
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
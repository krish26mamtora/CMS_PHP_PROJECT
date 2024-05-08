<?php
session_start();
include 'partials/nav.php';
include 'adminhomepage.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complaint Management System - Dashboard</title>
  <!-- Bootstrap CSS -->
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  
      <div class="col-md-9 py-4" id="all">
        <h2 class="text-center mb-4">Welcome to Complaint Management Dashboard</h2><br>
        <div id="he">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body" id="tc">
                <h5 class="card-title">Total Complaints</h5>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                
                $con = mysqli_connect($servername, $username, $password);
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $sql = "SELECT * FROM cwh_project.complaint";
                $result=mysqli_query($con,$sql);
                $num= mysqli_num_rows($result);
                ?>
                <p class="card-text"><h4> <?php echo $num; ?> </h4></p>
              </div>
            </div>
          </div>

          <!-- Add mb-4 class to each column to create space -->
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body"  id="rc">
                <h5 class="card-title">Resolved Complaints</h5>
                <p class="card-text"><h4>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $num=0;
                $con = mysqli_connect($servername, $username, $password,"cwh_project");
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $uname=$_SESSION['name'];
                $sql = "SELECT * FROM complaint where status= 'solved'";
                $result =  mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                echo $num ;
                ?>
                </h4></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body"  id="uc">
                <h5 class="card-title">Unresolved Complaints</h5>
                <p class="card-text"><h4>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $num=0;
                $con = mysqli_connect($servername, $username, $password,"cwh_project");
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $uname=$_SESSION['name'];
                $sql = "SELECT * FROM complaint where status= 'unsolved'";
                $result =  mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                echo $num ;
                ?>
                </h4></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body"  id="tu">
                <h5 class="card-title">Total Users</h5>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                
                $con = mysqli_connect($servername, $username, $password);
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $sql = "SELECT * FROM cwh_project.users";
                $result=mysqli_query($con,$sql);
                $num= mysqli_num_rows($result);
                ?>
                <p class="card-text"> <h4><?php echo $num; ?></h4> </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4" >
            <div class="card">
              <div class="card-body" id="og">
                <h5 class="card-title">Ongoing</h5>
                <p class="card-text"><h4>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $num=0;
                $con = mysqli_connect($servername, $username, $password,"cwh_project");
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $uname=$_SESSION['name'];
                $sql = "SELECT * FROM complaint where status= 'ongoing'";
                $result =  mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                echo $num ;
                ?>
                </h4></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4" >
            <div class="card">
              <div class="card-body" id="tm">
                <h5 class="card-title">Total Managers</h5>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                
                $con = mysqli_connect($servername, $username, $password);
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $sql = "SELECT * FROM cwh_project.manager";
                $result=mysqli_query($con,$sql);
                $num= mysqli_num_rows($result);
                ?>
                <p class="card-text"> <h4><?php echo $num; ?></h4> </p>
              </div>
            </div>
          </div>

        </div>
        </div>
      </div>
   

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
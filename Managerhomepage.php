<?php
// session_start();
// include 'partials/nav.php';
// $uname = $_SESSION['name'];
// echo $uname;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    div.col-md-9{
      padding: 20px;
    }
    .sidebar {
      height: 100vh; /* Set sidebar height to viewport height */
      background-color: #f8f9fa; /* Light grey background */
      padding: 20px;
    }
    
    .sidebar h4 {
      margin-bottom: 20px;
    }
    
    .sidebar ul {
      margin: 0;
      padding: 0;
      list-style-type: none;
    }
    
    .sidebar li {
      margin-bottom: 10px;
    }
    
    .sidebar a {
      text-decoration: none;
      color: #333; /* Dark grey text */
    }
    
    .sidebar a:hover {
      color: #007bff; /* Blue on hover */
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 sidebar">
      <h4>Quick Links</h4>
      <ul class="list-unstyled">
      <?php
        if(isset($_POST['login'])){
          $server="localhost";
          $username="root";
          $password="";
          $dbname="cwh_project";
          
          $con = mysqli_connect($server,$username,$password,$dbname);
          
          if(!$con){
            die("Connection to this database failed due to" . mysqli_connect_error());
          }
      ?>
        <li>
          <!-- <form method="POST" action="managernewcomplaints.php" class="form-container">
            <input type='hidden' name='complaint_id' value='<?php echo $uname; ?>'>
            <button type="submit" name="login" class="btn btn-primary btn-block">New Complaints</button>
          </form> -->
        </li>
      <?php
        }
       
      ?>
      <li><a href="managernewcomplaints.php" class="btn btn-link btn-block">New Complaint</a></li>
        <li><a href="#" class="btn btn-link btn-block">solved Complaint</a></li>
        <li><a href="#" class="btn btn-link btn-block">Pending Complaints</a></li>
        <li><a href="#" class="btn btn-link btn-block">Settings</a></li>
        
      </ul>
    </div>
    
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Total Complaints</h5>
              <p class="card-text">80</p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Unsolved Complaints</h5>
              <p class="card-text">80</p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Solved Complaints</h5>
              <p class="card-text">80</p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Pending Complaints</h5>
              <p class="card-text">80</p>
            </div>
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

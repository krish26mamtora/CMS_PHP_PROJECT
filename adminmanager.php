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
  <style> 
  #r{
    width: 900px;
  }
button{
  width: 100px;
  
}
table{
  text-align:center;
}


  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  
  <div class="col-md-9 py-4">
    <h2 class="text-center mb-4">Managers</h2>
    
    <div id="row">
      
    <div class="col-md-4 py-4">
      <!-- <h2 class="text-center mb-4">Filter by Department</h2> -->
      
<div class="container" id="r">
    <form action="adminmanager.php" method="GET">
        <div class="row align-items-end"> <!-- Added align-items-end to align items to the bottom of the row -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="department" class="form-label"><h4>Filter by Department</h4></label>
                </div>
            </div>
            <div class="col-md-6"> <!-- Adjusted column width -->
                <div class="form-group">
    <select id="department" name="department" class="form-select">
        <?php
        $server="localhost";
        $username="root";
        $password="";
        $dbname="cwh_project";
        
        $con =mysqli_connect($server,$username,$password,$dbname);
        
        if(!$con){
            die("connection to this database failed due to".mysqli_connect_error());
        }
        
      $sql = "SELECT department FROM add_department";
$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option>' . $row['department'] . '</option>';
    }
} else {
    echo '<option>No departments found</option>';
}
        ?>
    </select>
                </div>
            </div>
            <div class="col-md-2"> <!-- Adjusted column width -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>


    </div>

    </div>
    
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Department</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "cwh_project";
          $value=1;
            $con = mysqli_connect($servername, $username, $password, $database);
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Prepare SQL query
            $sql = "SELECT * FROM manager";
            if (isset($_GET['department']) && $_GET['department'] !== 'all') {
                $department = $_GET['department'];
                $sql .= " WHERE department = '$department'";
            }

            // Execute query and display data
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $value . "</td>";
                    $value=$value+1;
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
                    echo "<td><a href='#' class='btn btn-primary'>Show Details</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No records found.</td></tr>";
            }
            mysqli_close($con);
            ?>
          </tbody>
        </table>
   
    <!-- Filter Form -->
  </div>
</div>


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

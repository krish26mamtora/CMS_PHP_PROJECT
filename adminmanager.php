<?php
include 'adminhomepage.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complaint Management System - Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


    <div class="col-md-9 py-4">
      <h2 class="text-center mb-4">Managers</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
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
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
                    echo "<td><a href='#' class='btn btn-info btn-sm'>Show Details</a></td>";
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
    <div class="col-md-3 py-4">
      <h2 class="text-center mb-4">Filter by Department</h2>
      <form action="adminmanager.php" method="GET">
        <div class="form-group">
          <select id="department" name="department" class="form-control">
            <option value="all">All</option>
            <option value="IT Infrastructure">IT Infrastructure</option>
            <option value="Academic">Academic</option>
            <option value="AC and Electrical">AC and Electrical</option>
            <option value="Student Section">Student Section</option>
            <option value="Food Quality Problem">Food Quality Problem</option>
            <option value="Lost and Found Section">Lost and Found Section</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Add Manager Form -->
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form method="POST" action="add_manager.php">
        <div class="form-group">
          <button type="submit" name="managerperform" class="btn btn-primary btn-block">Add Manager</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
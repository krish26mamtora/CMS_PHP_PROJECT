<?php
if(isset($_POST['details'])){
  
header("location:admin_useralldetials.php") ;
exit;
}?>
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
  <title>Users List</title>
  <style>
    table{
      text-align:center;
     
    }
    thead{
      
    }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  
<h2 class="text-center mb-4">Users List</h2>  
<div class="container" id="r">
    <form action="adminusers.php" method="POST">
        <div class="row align-items-end"> <!-- Added align-items-end to align items to the bottom of the row -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="department" class="form-label"><h4>Filter by username</h4></label>
                </div>
            </div>
            <div class="col-md-6"> <!-- Adjusted column width -->
                <div class="form-group">
   
                  <input type="text" name="name">
                </div>
            </div>
            <div class="col-md-2"> <!-- Adjusted column width -->
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>


<?php
if(isset($_POST['submit'])){
?>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="thead-dark">
        <tr>
          <th>Name</th>
          <th>view details</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cwh_project";

        // Create connection
        $con = mysqli_connect($servername, $username, $password, $database);

        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $uname=$_POST['name'];
        $sql = "SELECT * FROM users where name='$uname'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo '<td>
                <form action="admin_useralldetials.php" method="POST">
                <input type="text" name="uname" style="display: none;" value='.$row["name"].'>

                  <button type="submit" name="details">View Details</button>
                </form></td>';

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found.</td></tr>";
        }

        // Close connection
        mysqli_close($con);
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
}

else
?>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="thead-dark">
        <tr>
          <th>Name</th>
          <th>view details</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cwh_project";

        // Create connection
        $con = mysqli_connect($servername, $username, $password, $database);

        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo '<td>
                <form action="admin_useralldetials.php" method="POST">
                <input type="text" name="uname" style="display: none;" value='.$row["name"].'>

                  <button type="submit" name="details">View Details</button>
                </form></td>';

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found.</td></tr>";
        }

        // Close connection
        mysqli_close($con);
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>



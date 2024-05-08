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

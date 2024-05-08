<?php
if(isset($_POST['updateButton'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handle Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Update Complaint</h2>
        <form method="POST" action="handle_update.php">
            <?php
            // Check if 'cno' is set and not empty
            
                $cno=$_POST['cno'];
                echo "<input type='hidden' name='cno' value='" . htmlspecialchars($cno) . "'>";
          
            ?>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="expectedDays">Expected Days:</label>
                <input type="number" class="form-control" id="expectedDays" name="expectedDays">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="ongoing">Ongoing</option>
                    <option value="solved">Solved</option>
                </select>
            </div>
            <button type="submit" name="submit1" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
}
?>


<!-- <?php
// Check if the form is submitted
if (isset($_POST['submit1'])) {
    // Include your database connection file
    $server="localhost";
      $username="root";
      $password="";
      $dbname="cwh_project";
      
      $con = mysqli_connect($server,$username,$password,$dbname);
      
      if(!$con){
          die("Connection to this database failed due to" . mysqli_connect_error());
      }

    // Retrieve form data
    $description = $_POST['description'];
    $expectedDays = $_POST['expectedDays'];
    $status = $_POST['status'];
    $cno = $_POST['cno'];
    // Insert data into the update_complaint table
    $sql = "INSERT INTO cwh_project.update_complaint (description, days, status, cno) VALUES ('$description', '$expectedDays', '$status','$cno')";

    if (mysqli_query($con, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?> -->


<?php

// if (isset($_POST['submit1'])) {
  
//     $server="localhost";
//       $username="root";
//       $password="";
//       $dbname="cwh_project";
      
//       $con = mysqli_connect($server,$username,$password,$dbname);
      
//       if(!$con){
//           die("Connection to this database failed due to" . mysqli_connect_error());
//       }

 
//     $description = $_POST['description'];
//     $expectedDays = $_POST['expectedDays'];
//     $status = $_POST['status'];
//     $cno = $_POST['cno'];
   
//     $sql = "INSERT INTO cwh_project.update_complaint (description, days, status, cno) VALUES ('$description', '$expectedDays', '$status','$cno')";

//     if (mysqli_query($con, $sql)) {
//         echo "Record inserted successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($con);
//     }


//     mysqli_close($con);
// }
?>


<?php

if (isset($_POST['submit1'])) {
  
    $server="localhost";
      $username="root";
      $password="";
      $dbname="cwh_project";
      
      $con = mysqli_connect($server,$username,$password,$dbname);
      
      if(!$con){
          die("Connection to this database failed due to" . mysqli_connect_error());
      }

 
    $description = $_POST['description'];
    $expectedDays = $_POST['expectedDays'];
    $status = $_POST['status'];
    $cno = $_POST['cno'];
   
    $sql= "UPDATE complaint
    SET status = '$status'
    WHERE cno = $cno";
    
    if (mysqli_query($con, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }


    mysqli_close($con);
}
?>
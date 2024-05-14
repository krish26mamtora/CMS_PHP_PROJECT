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
    <title>Department Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        .container {
            margin-top: 50px; /* Adjust margin-top as needed */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Enter Department Name</h2>
            <form action="adddepartment.php" method="POST">
                <div class="form-group">
                    <label for="department_name">Department Name:</label>
                    <input type="text" class="form-control" id="department_name" name="department_name">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Add</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional, if needed) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {

    $link = mysqli_connect("localhost", "root", "", "cwh_project");
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $department_name = $_POST['department_name'];
  
    $sql = "INSERT INTO add_department (department) VALUES ('$department_name')";

    if(mysqli_query($link, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
     
    // Close connection
    mysqli_close($link);
}
?>

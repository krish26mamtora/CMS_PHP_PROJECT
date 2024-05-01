<?php
 session_start();
require 'partials/nav.php';


if(isset($_POST['complaint'])){
  echo '
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong>Success</strong> Your complaint has been submitted successfully.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';



  
$server="localhost";
$username="root";
$password="";
$dbname="cwh_project";

$con =mysqli_connect($server,$username,$password,$dbname);

if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}


$department=$_POST['department'];
$complaint_details=$_POST['complaint_details'];
$username=$_POST['staticname'];
$location = $_POST['location'];
$sql ="INSERT INTO `cwh_project`.`complaint` (`department`, `complaint_details`, `uname`,`location`)
 VALUES ('$department', '$complaint_details', '$username','$location');";
  $result=mysqli_query($con,$sql);
  if($result){
   
      // echo("complaint  is added successfully");

  }else{
      echo "data is not selected".mysqli_error($con);
  }



}

?>





<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin-top: -50px; 

    }
    .form-container {
        max-width: 500px; /* Increased width */
        width: 100%;
    }
    .btn-center {
        display: flex;
        justify-content: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <form method="POST" action="usercomplaint.php" class="form-container">
      <h2 class="text-center mb-4">Add Complaint</h2>

      <div class="mb-3 row">
        <label for="staticname" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" name="staticname" id="staticname" value='<?php echo $_SESSION['name']; ?>'>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="complaint_details" class="col-sm-2 col-form-label">Complaint Details</label>
        <div class="col-sm-10">
        <textarea type="text" id="complaint_details" name="complaint_details"  class="" cols="40" rows="8" placeholder="Enter Problem"></textarea>

        <!-- <textarea name="complaint" class="form-control" id="complaint" rows="4"></textarea> -->
        </div>
      </div>

      <div class="mb-3">
        <label for="department" class="form-label">Please Select Department</label>
        <select id="department" name="department" class="form-select">
          <option>Disabled select</option>
          <option>IT Infrastructure</option>
          <option>Academic</option>
          <option>AC and Electrical</option>
          <option>Student Section</option>
          <option>Food Quality Problem</option>
          <option>Lost and Found Section</option>
        </select>
      </div>
  
      <div class="mb-3">
    <label for="location" class="form-label">Please Enter location</label>
    <input type="text" class="form-control" name="location" id="location">
  </div>


      <div class="mb-3 btn-center">
        <button type="submit" name="complaint" class="btn btn-primary">Complaint</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

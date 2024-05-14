<?php 
$showalert=false;
$showerror = false;
if(isset($_POST['managerperform1'])){
    $server="localhost";
$username="root";
$password="";
$dbname="cwh_project";
$con =mysqli_connect($server,$username,$password,$dbname);

if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
$name1 = $_POST['uname'];
$password = $_POST['password'];
$department = $_POST['department'];

$sql ="INSERT INTO `cwh_project`.`manager`(name, password, department) VALUES ('$name1','$password','$department')";
  $result=mysqli_query($con,$sql);
  if($result){
    $showalert = true;
  }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom CSS for center alignment and label positioning */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top:-20px;
        }
     
        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #5D7EF7;
        }

        /* Adjust input field width */
        .form-control {
            max-width: 100%; /* Set maximum width to 100% */
        }

        .btn-center {
            display: flex;
            justify-content: center;
        }
        #signup{
            color:#5D7EF7;
        }
    </style>
</head>
<body>
<?php require 'partials/nav.php';?> 
<?php
    if($showalert){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert" >
        <strong>Success</strong> Manager has been added successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($showerror){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 65px; margin-left :300px;">
    <strong>Error</strong> '. $showerror.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

        ';
    }
    ?>
<?php
    include 'adminhomepage.php';

    ?>
    <div class="container">
        <form method ="POST" action="add_manager.php" class="form-container">
            <h2 class="text-center">Add Manager</h2>
            <br>
            <div class="mb-3">
                <label for="uname" class="form-label">Username</label>
                <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
            <label for="department" class="form-label">Please Select Department</label>
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
          

            
            <div class="mb-3 btn-center">
                <button type="submit" name="managerperform1" class="btn btn-primary">Add</button>
            </div>
          
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


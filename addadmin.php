<?php 
$showalert=false;
$showerror = false;
    if(isset($_POST['adminperform1'])){
    
      include 'partials/dbconnect.php';
      $username =$_POST['uname'];
      $password = $_POST['password'];
      // $exist;
      $existsql = "SELECT * FROM `admin` WHERE name='$username'";
      $result = mysqli_query($link,$existsql);
      $numExistrows = mysqli_num_rows($result);
      if($numExistrows>0){
        $exist = true;
        $showerror = "Username already Exist!";

      }else{

        $sql= "INSERT INTO `users` (`name`, `password`, `date`) VALUES ('$username', '$password', current_timestamp());";
      $result = mysqli_query($link,$sql);
      if($result){
        $showalert = true;
      }
      
    
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
        <strong>Success</strong> Admin has been added successfully.
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
        <form method ="POST" action="addadmin.php" class="form-container">
            <h2 class="text-center">Add Admin</h2>
            <br>
            <div class="mb-3">
                <label for="uname" class="form-label">Username</label>
                <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
           
 
            <div class="mb-3 btn-center">
                <button type="submit" name="adminperform1" class="btn btn-primary" id="liveToastBtn">Add</button>
                
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                        <img src="..." class="rounded me-2" alt="...">
                        <strong class="me-auto">Bootstrap</strong>
                        <small>11 mins ago</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                        Hello, world! This is a toast message.
                        </div>
                    </div>
                    </div>
            </div>
          
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


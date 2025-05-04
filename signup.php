<?php 
$showalert=false;
$showerror = false;
    if(isset($_POST['signup'])){
      include 'partials/dbconnect.php';
      $username =$_POST['uname'];
      $password = $_POST['password'];
      $cpassword = $_POST['confirmpassword'];
      // $exist;
      $existsql = "SELECT * FROM `users` WHERE name='$username'";
      $result = mysqli_query($link,$existsql);
      $numExistrows = mysqli_num_rows($result);
      if($numExistrows>0){
        // $exist = true;
        $showerror = "Password do not match or username already Exist!";

      }else{
        // $exist = false;
     

      if(($password==$cpassword)){

        $sql= "INSERT INTO `users` (`name`, `password`, `date`) VALUES ('$username', '$password', current_timestamp());";
      $result = mysqli_query($link,$sql);
      if($result){
        $showalert = true;
      }

      }else{
        $showerror = "Password do not match or username already Exist!";
      }
    
    }
    }
    
    ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
    <?php require 'partials/nav.php'; ?>
    <?php
    if($showalert){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your account has been created you can login now
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($showerror){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> '.$showerror.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <div class="signup-container">
        <div class="signup-form-wrapper">
            <form method="POST" action="signup.php" class="signup-form">
                <h1 class="text-center">Signup</h1>
                <div class="form-group">
                    <label for="uname" class="form-label">Username</label>
                    <input type="text" maxlength="11" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="confirmpassword" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
                    <div class="form-text">Make sure you enter the same password</div>
                </div>
                <div class="form-group">
                    <button type="submit" name="signup" class="btn btn-primary signup-btn">Signup</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

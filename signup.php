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
        img{
            height:500px;
            width:500px;
        }
        #bar{
            margin-top:30px;
            height:550px;
            width:980px;
            background-color: #ebf5f9;
            border : 3px solid blue;
            border-radius:10px;
        }
        #form{
           margin-top:15px;
           margin-right:15px;

             border : 2px solid blue;

            background-color:white;

        }
    </style>
</head>
<body>
    <?php require 'partials/nav2.php'; ?>
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
     <div class="container" id="bar"> 
   <div class="container" id="in">
        <img src="signup.png"  alt="wait">
        <form method="POST"  id="form"action="signup.php" class="form-container">
            <h1 class="text-center">Signup</h1>
            <div class="mb-3">
                <label for="uname" class="form-label">Username</label>
                <input type="text" maxlength="11" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirm password</label>
                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
                <div id="passHelp" class="form-text">Make sure you enter the same password</div>
            </div>
            <div class="mb-3 btn-center">
                <button type="submit" name="signup" class="btn btn-primary">Signup</button>
            </div>
        </form>
        
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

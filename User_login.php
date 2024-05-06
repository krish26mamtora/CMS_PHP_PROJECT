<?php 
$login=false;
$showerror = false;
if(isset($_POST['login'])){
    include 'partials/dbconnect.php';
    $username = $_POST['uname'];
    $password = $_POST['password'];
  
    
 {   $sql = "SELECT * FROM users WHERE name='$username'";

    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);

        if($num==1){
          while($row = mysqli_fetch_assoc($result)){
            if(($password == $row['password'])){

              $login = true;
              session_start();
              $_SESSION['loggedin']=true;
              $_SESSION['name']=$username;
              $_SESSION['role']='User';
              header("location:homepage.php");
            }
            else {
              $showerror = "Invalid credentials";
               }   
          }
        } else {
            $showerror = "Invalid credentials";
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
    <?php require 'partials/nav.php'; ?>
    <?php
    if($login){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> You are logged in
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
    <div class="container">
        <form method ="POST" action="User_login.php" class="form-container">
            <h1 class="text-center">User Login</h1>
            <div class="mb-3">
                <label for="uname" class="form-label">Username</label>
                <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

          

            <div class="mb-3">
            <label for="signup" class="form-label" >New User?</label>
            <a href="signup.php" id="signup" name="signup" class="alert-link">Signup</a>
            </div>
            <div class="mb-3 btn-center">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
          
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
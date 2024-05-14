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
            /* background-color: #ebf5f9; */

            /* border: 1px solid #5D7EF7; */
        }
        #bar{
            height:100vh;
            width:100vw;
            display:flex;
            justify-content:center;
            /* background-color: #ebf5f9; */

        }
      
        .form-control {
            max-width: 100%; 
        }

        .btn-center {
            display: flex;
            justify-content: center;
        }
        #signup{
            color:#5D7EF7;
        }
        #in1{
            height:100vh;
            width:600px;
            margin-left:-30px
            /* margin-right:-20px; */

        }
        #in2{
            height:400px;
            width:480px;
            margin-left:-50px;
            /* margin-right:-20px; */

            background-color: #3333ff;
            border-radius:40px;
            margin-top:3px;

        }
        #both{
            border:2px solid blue;
            border-radius:50px;
            height:459px;
            width:800px;
            border: 2px solid #ccc;
             border-radius: 20px; 
             box-shadow: 20px 20px 20px rgba(0, 0, 0, 0.1);

        }
        #form{
            margin-top:40px;
            /* margin-right:160px; */
            margin-left:50px;
       

        }
        img{
            height:500px;
            width:500px;
        }
        #b{
            height:450px;
            width:450px;
           
        }
    </style>

    <!-- style="background-image: url('https://www.shutterstock.com/image-photo/consumer-feedback-concept-customer-satisfaction-260nw-2100424204.jpg');" -->
</head>
<body >
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
<div class="container" id="bar" >
        <div class="container" id="both">
          

   <div class="container" id="in2">

      
          <img src="mm.png" class="d-block w-100" alt="no">
         

        </div>
        <div class="container" id="in1">

        <form method ="POST" action="User_login.php" class="form-container" id="form">
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
                <button id="btn"type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
          
        </form>
        </div>
    </div>
    
   </div>
  
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z24LezCkAAQ8a/WPA5KZ9Guo6EAQ8bI/FFBp+" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
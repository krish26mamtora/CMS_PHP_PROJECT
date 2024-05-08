<?php 
$login=false;
$showerror = false;
if(isset($_POST['login'])){
    include 'partials/dbconnect.php';
    $username = $_POST['uname'];
    $password = $_POST['password'];
   
 {   $sql = "SELECT * FROM `admin` WHERE name='$username'";

    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);

    if($num==1){
        while($row = mysqli_fetch_assoc($result)){
          if(($password == $row['password'])){

              $login = true;
              session_start();
              $_SESSION['loggedin']=true;
              $_SESSION['name']=$username;
             $_SESSION['role'] = 'Admin';
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
      
       #in1{
           height:100vh;
           width:800px;
           margin-left:-50px;

       }
       #in2{
           height:500px;
           width:600px;
           margin-left:-20px;
           margin-right:-20px;

           background-color: blue;
           border-radius:50px;
           margin-top:5px;

       }
       #both{
           border:2px solid blue;
           border-radius:50px;
           height:450px;
           width:1000px;
       }
       #form{
           margin-top:40px;
           margin-left:90px;
       }
       img{
        height:500px;
        width:350px;
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

<div class="container" id="bar">
        <div class="container" id="both">
        <div class="container" id="in2">
        <img src="admin_3d.png" alt="wait">
    </div>
            <div class="container" id="in1">

       
        <form method ="POST" id="form"action="Admin_login.php" class="form-container">
            <h2 class="text-center">Admin Login</h2>
            <br>
            <div class="mb-3">
                <label for="uname" class="form-label">Username</label>
                <input type="text" autocomplete="off" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
<br>
            
            <div class="mb-3 btn-center">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
          
        </form>
        </div>
    
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

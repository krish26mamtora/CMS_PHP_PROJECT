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
            /* height:400px; */
             /* background-color: #ebf6f9; */
             border : 2px solid blue;

            background-color:white;

        }
      .qt{
        height:400px;
        width:400px;
        background-color:pink;
        margin-right:30px;
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
   <div class="container" id="bar"> 

   <div class="container" id="in">

        <div class="qt">
        <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="user_t.avif" class="d-block w-100" alt="no">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = true;
}else{
  $loggedin = false;
}
echo '

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IWT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .custom-navbar {
        background-color: #5D7EF7;
      }
     
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg custom-navbar" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Don</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">';

         if(!$loggedin){
          echo '
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>';
         }
         if($loggedin){
          echo '
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
          </li>';
         }
        if(!$loggedin){
          
          echo '
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>';
        }

        if($loggedin){       
        echo '</li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
      }

    
      echo '
      </ul>';

      if(!$loggedin){
        echo '
        <div class="as">
            <label for="role" class="form-label">Login As: </label>
            <div class="btn-group" role="group" name="role" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-light border-2" for="btnradio1">User</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-light border-2" for="btnradio2">Admin</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-light border-2" for="btnradio3">Manager</label>
            </div>
    </div>

      ';
    }
    

      echo '
    </div>
  </div>
</nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>';

?>

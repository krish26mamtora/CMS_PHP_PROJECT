

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    div.col-md-9{
      padding: 20px;
    }
    .sidebar {
      height: 100vh; /* Set sidebar height to viewport height */
      background-color: #f8f9fa; /* Light grey background */
      padding: 20px;
      color: #fff;
      margin-top:-50px;
    }
    
    .sidebar h4 {
      margin-bottom: 20px;
    }
    
    .sidebar ul {
      margin: 0;
      padding: 0;
      list-style-type: none;
      color: #fff;
    }
    
    .sidebar li {
      margin-bottom: 10px;
    }
    
    .sidebar a {
      text-decoration: none;
      color: #333; /* Dark grey text */
      color: #fff;
    }
    a {
    text-decoration: none; /* Remove underline */
    color: inherit; /* Inherit color from parent element */
    cursor: pointer; /* Set cursor to pointer */
}
    #one:hover,#two:hover,#three:hover,#four:hover{
      background-color:blue;
      color:white;
      
    }
   
    a {
    text-decoration: none !important; /* Remove underline */
    color: inherit !important; /* Inherit color from parent element */
    cursor: pointer !important; /* Set cursor to pointer */
}
#x{
  background-color:lightBlue;
}
#char{
  margin-left:100px;
}
  </style>
</head>
<body>

<div class="container-fluid" >
  <div class="row" >
    <div class="col-md-2 sidebar" style="text-align:center; background-color:#343a40; width:500px;">
      <h4>Quick Links</h4>
      <ul class="list-unstyled">
      <?php
        if(isset($_POST['login'])){
          $server="localhost";
          $username="root";
          $password="";
          $dbname="cwh_project";
          
          $con = mysqli_connect($server,$username,$password,$dbname);
          
          if(!$con){
            die("Connection to this database failed due to" . mysqli_connect_error());
          }

        }       
      ?>
      <li><div id="one"><a href="managernewcomplaints.php" class="btn btn-link btn-block"><i class="fas fa-clipboard-list"></i> New Complaint</a></div></li>
        <li><div id="two"><a href="#" class="btn btn-link btn-block"><i class="fas fa-clipboard-list"></i> solved Complaint</a></div></li>
        <li><div id="three"><a href="#" class="btn btn-link btn-block"><i class="fas fa-clipboard-list"></i>Pending Complaints</a></div></li>
        <li><div id="four"><a href="#" class="btn btn-link btn-block"><i class="fas fa-clipboard-list"></i>Settings</a></div></li>
      </ul>
     
    </div>
    
    <div class="col-md-9" style="text-align:center;">

    <h2>Welcome to CMS</h2>
<br><br>
      <div class="row" id="char">
        <div class="col-md-5" >
          <div class="card mb-4" id="x">
            <div class="card-body">
              <h5 class="card-title">Total Complaints</h5>
              <p class="card-text">
              <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $num=0;
                $con = mysqli_connect($servername, $username, $password,"cwh_project");
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $uname=$_SESSION['name'];
                $sql = "SELECT * FROM complaint WHERE cno IN (SELECT cno1 FROM manager_complaints WHERE name='$uname')";
                $result =  mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                echo $num ;
                ?>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card mb-4" id="x">
            <div class="card-body">
              <h5 class="card-title">Unsolved Complaints</h5>
              <p class="card-text">
              <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $num=0;
                $con = mysqli_connect($servername, $username, $password,"cwh_project");
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $uname=$_SESSION['name'];
                $sql = "SELECT * FROM complaint WHERE cno IN (SELECT cno1 FROM manager_complaints WHERE name='$uname' and status= 'unsolved')";
                $result =  mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                echo $num ;
                ?>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card mb-4" id="x">
            <div class="card-body">
              <h5 class="card-title">Solved Complaints</h5>
              <p class="card-text">
              <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $num=0;
                $con = mysqli_connect($servername, $username, $password,"cwh_project");
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $uname=$_SESSION['name'];
                $sql = "SELECT * FROM complaint WHERE cno IN (SELECT cno1 FROM manager_complaints WHERE name='$uname' and status= 'solved')";
                $result =  mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                echo $num ;
                ?>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card mb-4" id="x">
            <div class="card-body">
              <h5 class="card-title">Pending Complaints</h5>
              <p class="card-text">
              <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $num=0;
                $con = mysqli_connect($servername, $username, $password,"cwh_project");
                if (!$con) {
                    die("Sorry, we failed to connect: " . mysqli_connect_error());
                }   
                $uname=$_SESSION['name'];
                $sql = "SELECT * FROM complaint WHERE cno IN (SELECT cno1 FROM manager_complaints WHERE name='$uname' and status= 'ongoing')";
                $result =  mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                echo $num ;
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Add more columns or content here if needed -->
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
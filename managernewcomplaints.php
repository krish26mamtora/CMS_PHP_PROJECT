<?php
session_start();
include 'partials/nav.php';


    $server="localhost";
    $username="root"; 
    $password="";
    $dbname="cwh_project";
    
    $con = mysqli_connect($server, $username, $password, $dbname);
    
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    // $uname = $_POST['complaint_id'];
  $uname = $_SESSION['name'];
  echo $uname;
    $sql = "SELECT * FROM complaint WHERE cno IN (SELECT cno1 FROM manager_complaints WHERE name='$uname')";
    $result =  mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    $count = 1;

    // Adding table header
    echo '<table class="table table-striped table-hover">';
    echo '<thead>';
    echo '<tr><th>#</th><th>User Name</th><th>Action</th><th>Status</th></tr>';
    echo '</thead>';
    echo '<tbody>';

    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>' . $count . '</td>';
        echo '<td>' . htmlspecialchars($row['uname']) . '</td>';
        echo '<td>';
        echo '<form action="mviewdetails.php" method="post" id="btn">';
        echo '<input type="hidden" name="complaint_id" value="' . $uname . '">';
        echo '<button type="submit" name="perform_date">View details</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>' . htmlspecialchars($row['status']) . '</td>';
        echo '</tr>';
        $count++;
    }

    echo '</tbody>';
    echo '</table>';

?>

<?php
session_start();
include 'partials/nav.php';
if(isset($_POST['login'])){
    

    $server="localhost";
    $username="root";
    $password="";
    $dbname="cwh_project";
    
    $con =mysqli_connect($server,$username,$password,$dbname);
    
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    $uname=$_POST['uname'];
    $password=$_POST['password'];
    

    $sql = "SELECT * FROM complaint WHERE cno IN (SELECT cno1 FROM manager_complaints WHERE name='$uname')";

    $result =  mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    $count=1;
    while($row = mysqli_fetch_assoc($result)){
    
    
        echo('<table class="table table-striped table-hover">');
        echo('<tr><td>'.$count);
       
    
            echo('<td>' . htmlspecialchars($row['complaint_details']));
            echo('<td>' . htmlspecialchars($row['department']));
           echo('<td>');

    
    
        //  echo('<td>'.'<button type="submit"  name="perform_date" >View Details</button>');
             echo('</form>');
    
         echo('<form action="sample.txt" method="post" id="btn">');
         echo('<td>');
         echo('<button type="submit" name="perform_date">View Problem</button>');
         echo('</form>');
      echo('</td></tr>');
        echo('</table>');
      //  echo('</div>');
      $count=$count+1;
    }
    

    
    }
    ?>
    
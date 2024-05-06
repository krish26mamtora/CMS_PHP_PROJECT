<?php
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
    
    
        echo('<table border="1">');
        echo('<tr><td>'.$count);
       
    
            echo('<td>' . htmlspecialchars($row['complaint_details']));
            echo('<td>' . htmlspecialchars($row['department']));
           echo('<td>');

    
    
        //  echo('<td>'.'<button type="submit"  name="perform_date" >View Details</button>');
             echo('</form>');
    
         echo('<form action="sample.txt" method="post" id="btn">');
         echo('<td>');
         echo('<button type="submit" name="perform_date">View Progress</button>');
         echo('</form>');
      echo('</td></tr>');
        echo('</table>');
      //  echo('</div>');
      $count=$count+1;
    }
    

    
    }
    ?>
    

    <style>/* General reset and basic styling */
/* General reset and basic styling */
* {
    box-sizing: border-box;
    margin: 10px;
    padding: 10px;
}

/* Body styles */
body {
    background-color: #bcc4f5;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: Arial, sans-serif; /* Use a common font stack */
}

/* Flex container for centering */
.all {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Table styles */
table {
    border-collapse: collapse;
    width: 100%;
    max-width: 800px;
    background-color: #f0f0f0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    text-align: left;
}

table th,
table td {
    padding: 10px;
    border: 1px solid #ddd;
}

table th {
    background-color: #333;
    color: #fff;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}

/* Form styles */
#f1 {
    background-color: #fff;
    padding: 20px;
    width: 320px;
    height: 30vh;
    border: 1px solid black;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Input and button styles */
input[type="text"] {
    width: calc(100% - 20px); /* Adjusting for padding and margin */
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #bcc4f5;
    border-radius: 4px;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: 1px solid black;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Smooth hover effect */
}

button:hover {
    background-color: #2980b9;
}

/* Responsive styles */
@media (max-width: 768px) {
    table {
        max-width: 90%; /* Adjust the maximum width for smaller screens */
    }
}

@media (max-width: 480px) {
    #f1 {
        width: 90%; /* Adjust the width of the form for smaller screens */
    }
}

    </style>





  
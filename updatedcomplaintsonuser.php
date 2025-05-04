<?php
session_start();
include 'partials/nav.php';
if(isset($_POST['submit'])){
    // include 'usercomplaint.php';
    // header('Location:usercomplaint.php');
    // exit; // Add exit to stop further execution


$server="localhost";
$username="root";
$password="";
$dbname="cwh_project";

$con = mysqli_connect($server, $username, $password, $dbname);

if(!$con){
    die("connection to this database failed due to " . mysqli_connect_error());
}
$cno = $_POST['cno'];
echo $cno;
// session_start();
$sql = "SELECT * FROM complaint 
        JOIN update_complaint ON complaint.cno = update_complaint.cno
        WHERE complaint.uname = '" . $_SESSION['name'] . "' AND update_complaint.send = 'yes' AND complaint.cno = '$cno'";



$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if($num<1){
    echo "No update found";
}
else{
$count = 1;
echo('<div class="container">');
echo('<h3>Your Complaints</h3>');
echo('<table class="table">');
echo('<thead class="table-primary">');
echo('<tr>');
echo('<th>'.'Number'.'</th>');
echo('<th>'.'Details'.'</th>');
echo('<th>'.'Location'.'</th>');

echo('<th>'.'Department'.'</th>');
echo('<th>'.'Date'.'</th>');
echo('<th>'.'Progress'.'</th>');

echo('</tr>');
echo('</thead>');
echo('<tbody>');

while($row = mysqli_fetch_assoc($result)){
    echo('<tr>');
    echo('<td>'.$count.'</td>');
    echo('<td>'.htmlspecialchars($row['complaint_details']).'</td>');
    echo('<td>'.htmlspecialchars($row['location']).'</td>');

    echo('<td>'.htmlspecialchars($row['department']).'</td>');
    echo('<td>'.htmlspecialchars($row['date']).'</td>');
    echo('<td>'.htmlspecialchars($row['status']).'</td>');
//     echo('<form action="temp.txt" method="post" id="btn">');
//     echo('<td>');
//     echo('<button type="submit" class="btn btn-outline-primary" >View Progress</button>');
//     echo('</form>');
//  echo('</td>');


    echo('</tr>');
    $count++;
}

}

mysqli_close($con); // Close connection



}
?>
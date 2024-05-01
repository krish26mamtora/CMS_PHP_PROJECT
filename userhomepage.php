<?php
// session_start();

if(isset($_POST['complaint'])){
    // include 'usercomplaint.php';
    header('Location:usercomplaint.php');
    exit; // Add exit to stop further execution
}

$server="localhost";
$username="root";
$password="";
$dbname="cwh_project";

$con = mysqli_connect($server, $username, $password, $dbname);

if(!$con){
    die("connection to this database failed due to " . mysqli_connect_error());
}

// session_start();
$sql = 'SELECT * FROM complaint where uname= "' . $_SESSION['name'] . '"';
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
$count = 1;

echo('<div class="container">');
echo('<table class="table">');
echo('<thead class="table-primary">');
echo('<tr>');
echo('<th>'.'Number'.'</th>');
echo('<th>'.'Details'.'</th>');
echo('<th>'.'Name'.'</th>');
echo('<th>'.'Date'.'</th>');
echo('<th>'.'Progress'.'</th>');

echo('</tr>');
echo('</thead>');
echo('<tbody>');

while($row = mysqli_fetch_assoc($result)){
    echo('<tr>');
    echo('<td>'.$count.'</td>');
    echo('<td>'.htmlspecialchars($row['complaint_details']).'</td>');
    echo('<td>'.htmlspecialchars($row['department']).'</td>');
    echo('<td>'.htmlspecialchars($row['date']).'</td>');

    echo('<form action="temp.txt" method="post" id="btn">');
    echo('<td>');
    echo('<button type="submit" name="perform_date">View Progress</button>');
    echo('</form>');
 echo('</td>');


    echo('</tr>');
    $count++;
}

echo('</tbody>');
echo('</table>');
echo('</div>');

mysqli_close($con); // Close connection
?>


<div class="container text-center"> 
    <form action="usercomplaint.php" id="f1">
        <input type="submit" value="Add Complaint" name="complaint" class="btn btn-primary"> <!-- Added Bootstrap button class -->
    </form>
</div>
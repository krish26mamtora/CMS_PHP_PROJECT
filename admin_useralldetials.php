
<?php
session_start();
include 'partials/nav.php';
include 'adminhomepage.php';

if(isset($_POST['details'])){
$servername = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username, $password,"cwh_project");
if (!$con) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

$uname=$_POST['uname'];
    $sql = "SELECT * FROM complaint WHERE `uname` = '$uname'";

echo '

    
<div class="container" style="display:flex; justify-content:center; ">
<div class="col-md-8">
    <div class="complaints-table" style="text-align:center;">
        <br><br>
        <h3>Complaint History of User : '.$uname.'</h3>
        <br>
        <table class="table table-hover" style="width:850px; margin-left:-80px;">
            <thead>
            <tr>
            <th style="background-color:#b3d9ff;">Cno</th>
                <th style="background-color:#b3d9ff;">Department</th>
                <th style="background-color:#b3d9ff;">Complaint Details</th>
                <th style="background-color:#b3d9ff;">Date</th>
                <th style="background-color:#b3d9ff;">Location</th>
                <th style="background-color:#b3d9ff;">Status</th>
                </tr>
            </thead>
            <tbody>';

                
               
                if ($result = mysqli_query($con, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" .$row["cno"] . "</td>";
                            echo "<td>" . $row["department"] . "</td>";
                            echo "<td>" . $row["complaint_details"] . "</td>";
                            echo "<td>" .$row["date"] . "</td>";

                            echo "<td>" .$row["location"] . "</td>";

                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td>";
                           
                            echo "</tr>";
                        }
                        mysqli_free_result($result);
                    } else {
                        echo "<tr><td colspan='3'>No Complaints found.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>ERROR: Could not able to execute $sql. " . mysqli_error($con) . "</td></tr>";
                }

                echo'
              
            </tbody>
        </table>
    </div>
</div>
</div>
'
;
            }
?>
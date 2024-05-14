<?php
session_start();
include 'partials/nav.php';
echo '<div style="margin-top:50px";></div>';

include 'managerleft.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body >
<!-- <div class="container" style="margin-left:; margin-top:; "> -->

<div class="container" style="margin-left:700px; margin-top:-600px; ">
    <div class="aa" >
    <div class="row mt-4" >
        <?php
        if(isset($_POST['perform_date'])){
            $server="localhost";
            $username="root";
            $password="";
            $dbname="cwh_project";

            $con = mysqli_connect($server,$username,$password,$dbname);

            if(!$con){
                die("Connection to this database failed due to" . mysqli_connect_error());
            }

            $uname=$_POST['complaint_id'];
            $cno= $_POST['complaint_cno'];
            $sql = "SELECT * FROM complaint WHERE cno IN (SELECT cno1 FROM manager_complaints WHERE name='$uname' and cno='$cno')";
            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-md-4 mb-4'  style='text-align:center;'>";
                    echo "<h5 class='card-title'>Complaint Details</h5>";
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<p class='card-text'>Complaint: " . htmlspecialchars($row['complaint_details']) . "</p>";
                    echo "<p class='card-text'>Department: " . htmlspecialchars($row['department']) . "</p>";
                    echo "<p class='card-text'>Username: " . htmlspecialchars($row['uname']) . "</p>";
                    echo "<p class='card-text'>Date: " . htmlspecialchars($row['date']) . "</p>";
                    echo "<p class='card-text'>complaint number: " . htmlspecialchars($row['cno']) . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                    // Add hidden input field to pass cno to the update form
                    echo "<form id='updateForm' method='POST' action='handle_update.php'>";
                    echo "<input type='hidden' name='cno' value='" . htmlspecialchars($row['cno']) . "'>";
                    echo "<div class='col-md-12 text-center'>";
                    echo "<button type='submit' class='btn btn-primary' name='updateButton'  style='margin-left:-750px;'>Update</button>";
                    echo "</div>";
                    echo "</form>";
                }
            } else {
                echo "<p>No complaints found.</p>";
            }
        }
        ?>
    </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
<?php
session_start();
include 'partials/nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <h4>Quick Links</h4>
            <ul class="list-unstyled">
                <!-- Quick links here -->
            </ul>
        </div>

        <div class="col-md-9">
            <div id="complaintDetails">
                <!-- Complaint details will be displayed here -->
            </div>
        </div>
    </div>

    <div class="row mt-4">
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
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>Complaint Details</h5>";
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
                    echo "<button type='submit' class='btn btn-primary' name='updateButton'>Update</button>";
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>

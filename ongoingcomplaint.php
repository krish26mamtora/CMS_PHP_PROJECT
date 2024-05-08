<?php
session_start();
include 'partials/nav.php';
include 'adminhomepage.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
   
<div class='container' style="display:flex; justify-content:center; ">
    <div class='col-md-8'>
        <div class='complaints-table' style="text-align:center;">
            <br><br></br>
        <h2>Complaints with Ongoing Status</h2>
        <br>
        <table class="table table-hover" style="width:850px; margin-left:-80px;">
            <thead>
                <tr>
                <th scope="col" style="background-color:#b3d9ff;">Cno</th>
                    <th scope="col" style="background-color:#b3d9ff;">Description</th>
                    <th scope="col" style="background-color:#b3d9ff;">Days</th>
                    <th scope="col" style="background-color:#b3d9ff;">Department</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establishing connection to the database
                $server = "localhost";
                $username = "root";
                $password = "";
                $dbname = "cwh_project";

                $con = mysqli_connect($server, $username, $password, $dbname);

                // Check connection
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }

                // SQL query to fetch complaint details, department, and username
                $sql = "SELECT * from update_complaint where status='ongoing'";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";

                        echo "<td>" . $row["cno"] . "</td>";

                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["days"] . "</td>";
                        echo "<td>" . $row["department"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>0 results</td></tr>";
                }
                $con->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

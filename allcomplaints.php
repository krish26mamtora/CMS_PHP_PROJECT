<?php
session_start();
include 'partials/nav.php';
include 'adminhomepage.php';

$servername = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username, $password);
if (!$con) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

if (isset($_GET['department']) && $_GET['department'] !== 'all') {
    $_department = $_GET['department'];

    $sql = "SELECT * FROM cwh_project.complaint WHERE department = '$_department'";
} else {
    $sql = "SELECT * FROM cwh_project.complaint";
}

?>


<div class='container' style="display:flex; justify-content:center; ">
    <div class='col-md-8'>
        <div class='complaints-table' style="text-align:center;">
            <br><br>
            <h3>All Complaints</h3>
            <br>
            <table class="table table-hover" style="width:850px; margin-left:-80px;">
                <thead>
                    <tr>
                    <th style="background-color:#b3d9ff;">Cno</th>
                    <th style="background-color:#b3d9ff;">Username</th>
                        <th style="background-color:#b3d9ff;">Complaint Details</th>
                        <th style="background-color:#b3d9ff;">Department</th>
                        <th style="background-color:#b3d9ff;">Status</th>
                        <th style="background-color:#b3d9ff;">Send</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result = mysqli_query($con, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" .$row['cno'] . "</td>";

                                echo "<td>" . $row['uname'] . "</td>";
                                echo "<td>" . $row['complaint_details'] . "</td>";
                                echo "<td>" . $row['department'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "<td>";
                                // Form for each row
                                echo "<form action='inserttomanager.php' method='post'>";
                                // Hidden inputs inside the form
                                echo "<input type='hidden' name='complaint_id' value='" . $row['cno'] . "'>";
                                echo "<input type='hidden' name='department' value='" . $row['department'] . "'>";
                                // Submit button
                                echo "<button type='submit' name='submit' class='btn btn-primary'>Send</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            mysqli_free_result($result);
                        } else {
                            echo "<tr><td colspan='3'>No records matching your query were found.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>ERROR: Could not able to execute $sql. " . mysqli_error($con) . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
mysqli_close($con);
?>
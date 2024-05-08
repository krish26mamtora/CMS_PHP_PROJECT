<?php
include 'partials/nav.php';
include 'adminhomepage.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "cwh_project";

// Establish connection
$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $cno = $_POST['complaint_id'];
    $department = $_POST['department'];

    $sql = "SELECT * FROM `cwh_project`.`manager` where department='$department' ";

    $manager_result = mysqli_query($con, $sql);
    if (!$manager_result) {
        die("ERROR: Could not able to execute $sql. " . mysqli_error($con));
    }

    // Debug output to inspect manager_result
    // var_dump($manager_result);
?>
<div class="container" style="margin-top: 150px; height:250px; width: 600px; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
    <form method="POST" action="insertintomanager.php" class="form-container" style="padding: 20px;">
        <h2 class="text-center mb-4">Send Complaint to Manager</h2>
        <div class="mb-3 row">
            <label for="managerSelect" class="col-sm-4 col-form-label">Select Manager Name</label>
            <div class="col-sm-8">
                <select class="form-control" id="managerSelect" name="manager_id">
                    <?php
                    while ($row = mysqli_fetch_assoc($manager_result)) {
                        echo "<option>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-4"></div> <!-- Spacer for symmetry -->
            <div class="col-sm-8 btn-center">
                <?php
                echo "<input type='hidden' name='complaint_id' value='" . $cno . "'>";
                ?>
                <br>
                <button type="submit" name="insertperform" class="btn btn-primary">Send</button>
            </div>
        </div>
    </form>
</div>


<?php
}
?>
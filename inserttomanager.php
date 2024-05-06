<?php
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
    echo $department;
    $sql = "SELECT * FROM `cwh_project`.`manager` where department='$department' ";
    $manager_result = mysqli_query($con, $sql);
    if (!$manager_result) {
        die("ERROR: Could not able to execute $sql. " . mysqli_error($con));
    }

    // Debug output to inspect manager_result
    // var_dump($manager_result);
?>

    <form method ="POST" action="insertintomanager.php" class="form-container">
    <h2 class="text-center">Send Complaint</h2>
    <br>
    <div class="mb-3">
        <label for="uname" class="form-label">Manager</label>
        <select class="form-control" id="managerSelect" name="manager_id">
            <?php
            while ($row = mysqli_fetch_assoc($manager_result)) {
                echo "<option>" . $row['name'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <?php
        echo "<input type='hidden' name='complaint_id' value='" . $cno . "'>";
        ?>
    </div>
   

    <div class="mb-3 btn-center">
        <button type="submit" name="insertperform" class="btn btn-primary">Send</button>
    </div>
  
</form>
<?php
}
?>

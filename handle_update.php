<?php
if(isset($_POST['updateButton'])){
    include 'partials/nav.php';
    echo '<div style="margin-top:50px";></div>';

    include 'managerleft.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handle Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-left:500px; width:800px; margin-top:-600px; background-color:lightBlue; height:500px; width:700px; border-radius:5px; padding:30px;">        <h2 class="text-center">Update Complaint</h2>
        <form method="POST" action="handle_update.php">
            <?php
            // Check if 'cno' is set and not empty
            
                $cno=$_POST['cno'];
                echo "<input type='hidden' name='cno' value='" . htmlspecialchars($cno) . "'>";
          echo htmlspecialchars($cno);
            ?>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="expectedDays">Expected Days:</label>
                <input type="number" class="form-control" id="expectedDays" name="expectedDays">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="ongoing">Ongoing</option>
                    <option value="solved">Solved</option>
                </select>
            </div>
            <button type="submit" name="submit1" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
}
?>

 <?php
// Check if the form is submitted
if (isset($_POST['submit1'])) {
    // Include your database connection file
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cwh_project";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }

    // Retrieve form data
    $cno = $_POST['cno'];
    $description = $_POST['description'];
    $expectedDays = $_POST['expectedDays'];
    $status = $_POST['status'];

    // Check if the record already exists
    $select_query = "SELECT COUNT(*) as count FROM cwh_project.update_complaint WHERE cno = '$cno'";
    $result = mysqli_query($con, $select_query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        if ($count > 0) {
            // Record already exists, perform an UPDATE
            $sql_update_complaint = "UPDATE cwh_project.update_complaint 
                                     SET description = '$description', 
                                         days = '$expectedDays', 
                                         status = '$status' 
                                     WHERE cno = '$cno'";
        } else {
            // Record does not exist, perform an INSERT
            $sql_update_complaint = "INSERT INTO cwh_project.update_complaint (description, days, status, cno) 
                                     VALUES ('$description', '$expectedDays', '$status','$cno')";
        }

        // Execute the SQL query for update_complaint table
        if (mysqli_query($con, $sql_update_complaint)) {
            // Update the status column in complaint table
            $sql_complaint = "UPDATE cwh_project.complaint SET status = '$status' WHERE cno = '$cno'";
            if (mysqli_query($con, $sql_complaint)) {
                echo "Record inserted/updated successfully";
            } else {
                echo "Error updating status in complaint table: " . mysqli_error($con);
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?> 






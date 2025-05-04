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
?>
<link rel="stylesheet" href="styles/userhomepage.css">

<?php
// session_start();
$sql = 'SELECT * FROM complaint where uname= "' . $_SESSION['name'] . '"';
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
$count = 1;
echo('<div class="container">');
echo('<div class="header-row">');
echo('<h3>Your Complaints</h3>');
echo('<form action="usercomplaint.php" id="f1">');
echo('<input type="submit" value="Add Complaint" name="complaint" class="btn btn-primary">');
echo('</form>');
echo('</div>');
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
    echo('<td>');
    echo('<button type="button" class="btn btn-outline-primary view-complaint" data-complaint="' . htmlspecialchars(json_encode([
        'details' => $row['complaint_details'],
        'department' => $row['department'],
        'location' => $row['location'],
        'date' => $row['date'],
        'status' => $row['status']
    ])) . '">View Progress</button>');
    echo('</td>');

    echo('</tr>');
    $count++;
}

echo('</tbody>');
echo('</table>');
echo('</div>');

mysqli_close($con); // Close connection
?>



<br><br>
<br><br><br>
<?php

// include 'partials/footer2.html';

?>

<!-- // Add this before closing body tag
echo(' -->
<div class="modal fade" id="complaintModal" tabindex="-1" aria-labelledby="complaintModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="complaintModalLabel">Complaint Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="complaint-info">
                    <div class="info-group">
                        <label>Details:</label>
                        <p id="modalDetails"></p>
                    </div>
                    <div class="info-group">
                        <label>Department:</label>
                        <p id="modalDepartment"></p>
                    </div>
                    <div class="info-group">
                        <label>Location:</label>
                        <p id="modalLocation"></p>
                    </div>
                    <div class="info-group">
                        <label>Date:</label>
                        <p id="modalDate"></p>
                    </div>
                    <div class="info-group">
                        <label>Status:</label>
                        <p id="modalStatus"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".view-complaint");
    buttons.forEach(button => {
        button.addEventListener("click", function() {
            const data = JSON.parse(this.dataset.complaint);
            document.getElementById("modalDetails").textContent = data.details;
            document.getElementById("modalDepartment").textContent = data.department;
            document.getElementById("modalLocation").textContent = data.location;
            document.getElementById("modalDate").textContent = data.date;
            document.getElementById("modalStatus").textContent = data.status;
            
            const modal = new bootstrap.Modal(document.getElementById("complaintModal"));
            modal.show();
        });
    });
});
</script>
');
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
    <title>All Complaints</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/complaints.css">
</head>
<body>
    <div class='container' style="display:flex; justify-content:center;">
        <div class='col-md-10'>
            <div class='complaints-table'>
                <br><br>
                <h2 class="text-center">Complaints Management</h2>
                <br>
                
                <!-- Filter Section -->
                <div class="filters">
                    <div class="row">
                        <div class="col-md-3">
                            <select id="departmentFilter" class="form-control">
                                <option value="">All Departments</option>
                                <?php
                                $server = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "cwh_project";
                                
                                $con = mysqli_connect($server, $username, $password, $dbname);
                                
                                if(!$con){
                                    die("connection failed: " . mysqli_connect_error());
                                }
                                
                                $sql = "SELECT DISTINCT department FROM complaint";
                                $result = mysqli_query($con, $sql);
                                
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['department'] . "'>" . $row['department'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select id="statusFilter" class="form-control">
                                <option value="">All Status</option>
                                <option value="unsolved">Unsolved</option>
                                <option value="ongoing">Ongoing</option>
                                <option value="solved">Solved</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search by username...">
                        </div>
                    </div>
                </div>
                
                <br>
                <!-- Complaints Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Cno</th>
                            <th scope="col">Username</th>
                            <th scope="col">Complaint Details</th>
                            <th scope="col">Department</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="complaintsTableBody">
                        <?php
                        $sql = "SELECT * FROM complaint";
                        $result = mysqli_query($con, $sql);
                        
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='complaint-row' 
                                    data-department='" . $row['department'] . "' 
                                    data-status='" . $row['status'] . "' 
                                    data-username='" . $row['uname'] . "'>";
                            echo "<td>" . $row['cno'] . "</td>";
                            echo "<td>" . $row['uname'] . "</td>";
                            echo "<td>" . $row['complaint_details'] . "</td>";
                            echo "<td>" . $row['department'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>";
                            if($row['status'] != 'solved') {
                                echo '<form method="post" action="inserttomanager.php">
                                    <input type="hidden" name="complaint_id" value="' . $row['cno'] . '">
                                    <input type="hidden" name="department" value="' . $row['department'] . '">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Assign</button>
                                </form>';
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                        mysqli_close($con);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Filter functionality
        function filterComplaints() {
            const department = document.getElementById('departmentFilter').value.toLowerCase();
            const status = document.getElementById('statusFilter').value.toLowerCase();
            const search = document.getElementById('searchInput').value.toLowerCase();
            
            const rows = document.getElementsByClassName('complaint-row');
            
            Array.from(rows).forEach(row => {
                const rowDepartment = row.getAttribute('data-department').toLowerCase();
                const rowStatus = row.getAttribute('data-status').toLowerCase();
                const rowUsername = row.getAttribute('data-username').toLowerCase();
                
                const departmentMatch = department === '' || rowDepartment === department;
                const statusMatch = status === '' || rowStatus === status;
                const searchMatch = search === '' || rowUsername.includes(search);
                
                row.style.display = departmentMatch && statusMatch && searchMatch ? '' : 'none';
            });
        }

        // Add event listeners
        document.getElementById('departmentFilter').addEventListener('change', filterComplaints);
        document.getElementById('statusFilter').addEventListener('change', filterComplaints);
        document.getElementById('searchInput').addEventListener('input', filterComplaints);
    </script>
</body>
</html>
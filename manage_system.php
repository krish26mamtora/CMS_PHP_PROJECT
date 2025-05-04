<?php
session_start();
include 'partials/nav.php';
include 'adminhomepage.php';

$server = "localhost";
$username = "root";
$password = "";
$dbname = "cwh_project";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}

// Handle department addition
if (isset($_POST['add_department'])) {
    $department = $_POST['department'];
    $sql = "INSERT INTO add_department (department) VALUES ('$department')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Department added successfully');</script>";
    } else {
        echo "<script>alert('Error adding department');</script>";
    }
}

// Handle admin addition
if (isset($_POST['add_admin'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO admin (uname, password) VALUES ('$uname', '$password')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Admin added successfully');</script>";
    } else {
        echo "<script>alert('Error adding admin');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Management</title>
    <link rel="stylesheet" href="styles/manage_system.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="management-cards">
            <!-- Department Management Card -->
            <div class="management-card">
                <h2><i class="fas fa-building"></i> Department Management</h2>
                <button class="btn-add" onclick="showDepartmentModal()">
                    <i class="fas fa-plus"></i> Add New Department
                </button>
                <div class="items-list">
                    <?php
                    $sql = "SELECT * FROM add_department";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='item'>";
                        echo "<span>" . htmlspecialchars($row['department']) . "</span>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <!-- Admin Management Card -->
            <div class="management-card">
                <h2><i class="fas fa-users-cog"></i> Admin Management</h2>
                <button class="btn-add" onclick="showAdminModal()">
                    <i class="fas fa-plus"></i> Add New Admin
                </button>
                <div class="items-list admin-list">
                    <?php
                    $sql = "SELECT * FROM admin";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='item admin-item'>";
                            echo "<span class='admin-name'>" . htmlspecialchars($row['uname']) . "</span>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='no-items'>No admins found</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Department Modal -->
    <div id="departmentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDepartmentModal()">&times;</span>
            <h2>Add New Department</h2>
            <form method="POST" class="management-form">
                <div class="form-group">
                    <label for="department">Department Name</label>
                    <input type="text" id="department" name="department" required>
                </div>
                <button type="submit" name="add_department" class="btn-submit">Add Department</button>
            </form>
        </div>
    </div>

    <!-- Admin Modal -->
    <div id="adminModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAdminModal()">&times;</span>
            <h2>Add New Admin</h2>
            <form method="POST" class="management-form">
                <div class="form-group">
                    <label for="uname">Username</label>
                    <input type="text" id="uname" name="uname" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="add_admin" class="btn-submit">Add Admin</button>
            </form>
        </div>
    </div>

    <script>
        // Modal handling functions
        function showDepartmentModal() {
            document.getElementById('departmentModal').style.display = 'block';
        }

        function closeDepartmentModal() {
            document.getElementById('departmentModal').style.display = 'none';
        }

        function showAdminModal() {
            document.getElementById('adminModal').style.display = 'block';
        }

        function closeAdminModal() {
            document.getElementById('adminModal').style.display = 'none';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }

        function deleteAdmin(id) {
            if (confirm('Are you sure you want to delete this admin?')) {
                // Create a form and submit it
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="delete_admin" value="${id}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>
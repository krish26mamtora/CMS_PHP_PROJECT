<?php
session_start();
require 'partials/nav.php';

$server = "localhost";
$username = "root";
$password = "";
$dbname = "cwh_project";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}

// Handle Add/Edit/Delete operations
if (isset($_POST['action'])) {
    if ($_POST['action'] === 'add') {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $department = $_POST['department'];
        
        $sql = "INSERT INTO manager (name, password, department) VALUES ('$name', '$password', '$department')";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Manager added successfully');</script>";
        } else {
            echo "<script>alert('Error adding manager');</script>";
        }
    } elseif ($_POST['action'] === 'edit') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $department = $_POST['department'];
        
        $sql = "UPDATE manager SET name='$name', department='$department' WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Manager updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating manager');</script>";
        }
    } elseif ($_POST['action'] === 'delete') {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM manager WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Manager deleted successfully');</script>";
        } else {
            echo "<script>alert('Error deleting manager');</script>";
        }
    }
}

// Fetch all managers
$sql = "SELECT * FROM manager";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Managers</title>
    <link rel="stylesheet" href="styles/manage_managers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php
    include 'adminhomepage.php';
    ?>
    <div class="container">
        <div class="header-section">
            <h2>Manage Managers</h2>
            <button class="btn-add" onclick="showAddModal()">
                <i class="fas fa-plus"></i> Add New Manager
            </button>
        </div>

        <div class="managers-list-section">
            <div class="managers-grid">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="manager-card">
                        <div class="manager-info">
                            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                            <p>Department: <?php echo htmlspecialchars($row['department']); ?></p>
                        </div>
                        <div class="manager-actions">
                            <button class="btn-edit" onclick="editManager(<?php echo $row['id']; ?>, '<?php echo $row['name']; ?>', '<?php echo $row['department']; ?>')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this manager?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Add Manager Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddModal()">&times;</span>
            <h2>Add New Manager</h2>
            <form method="POST" class="manager-form">
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select id="department" name="department" required>
                        <?php
                        $dept_sql = "SELECT department FROM add_department";
                        $dept_result = mysqli_query($con, $dept_sql);
                        while ($dept_row = mysqli_fetch_assoc($dept_result)) {
                            echo "<option value='" . $dept_row['department'] . "'>" . $dept_row['department'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Add Manager</button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Manager</h2>
            <form method="POST" class="manager-form">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" id="edit-id">
                <div class="form-group">
                    <label for="edit-name">Username</label>
                    <input type="text" id="edit-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="edit-department">Department</label>
                    <select id="edit-department" name="department" required>
                        <?php
                        mysqli_data_seek($dept_result, 0);
                        while ($dept_row = mysqli_fetch_assoc($dept_result)) {
                            echo "<option value='" . $dept_row['department'] . "'>" . $dept_row['department'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Update Manager</button>
            </form>
        </div>
    </div>

    <script>
        const addModal = document.getElementById('addModal');
        const editModal = document.getElementById('editModal');
        const spans = document.getElementsByClassName('close');

        function showAddModal() {
            addModal.style.display = 'block';
        }

        function closeAddModal() {
            addModal.style.display = 'none';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target == addModal) {
                closeAddModal();
            }
            if (event.target == editModal) {
                editModal.style.display = 'none';
            }
        }

        const modal = document.getElementById('editModal');
        const span = document.getElementsByClassName('close')[0];

        function editManager(id, name, department) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-department').value = department;
            modal.style.display = 'block';
        }

        span.onclick = function() {
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
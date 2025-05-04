<?php 
$showalert = false;
$showerror = false;

if (isset($_POST['adminperform1'])) {
    include 'partials/dbconnect.php';
    
    $username = mysqli_real_escape_string($link, trim($_POST['uname']));
    $password = mysqli_real_escape_string($link, trim($_POST['password']));
    
    if (empty($username) || empty($password)) {
        $showerror = "All fields are required!";
    } else {
        $existsql = "SELECT * FROM `admin` WHERE name='$username'";
        $result = mysqli_query($link, $existsql);
        $numExistrows = mysqli_num_rows($result);

        if ($numExistrows > 0) {
            $showerror = "Username already exists!";
        } else {
            $sql = "INSERT INTO `admin` (`name`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $showalert = true;
            } else {
                $showerror = "Failed to insert admin!";
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Admin</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style/AddAdmin.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require 'partials/nav.php'; ?>
    <?php include 'adminhomepage.php'; ?>

    <div class="container my-4">
        <?php if ($showalert): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Admin has been added successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($showerror): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?= $showerror ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST" action="addadmin.php" class="form-container shadow p-4 rounded bg-light">
            <h2 class="text-center mb-4">Add Admin</h2>

            <div class="mb-3">
                <label for="uname" class="form-label">Username</label>
                <input type="text" class="form-control" id="uname" name="uname" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" name="adminperform1" class="btn btn-primary px-4">Add</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

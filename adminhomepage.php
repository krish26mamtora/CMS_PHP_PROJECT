<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complaint Management System - Admin</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS (for icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* Custom CSS */
    .sidebar {
      background-color: #343a40;
      color: #fff;
    }
    .sidebar-heading {
      padding: 1rem;
    }
    .sidebar-menu {
      list-style: none;
      padding: 0;
    }
    .sidebar-menu li {
      padding: 0.5rem;
    }
    .sidebar-menu li a {
      color: #fff;
    }
    .complaints-table {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 sidebar">
        <div class="sidebar-heading">
          Complaint Management
        </div>
        <ul class="sidebar-menu">
          <li><a href="admindashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
          <li><a href="adminusers.php"><i class="fas fa-user"></i> Users</a></li>
          <li><a href="adminmanager.php"><i class="fas fa-user"></i> Managers</a></li>
          <li><a href="addadmin.php"><i class="fas fa-sign-out-alt"></i> Add Admin</a></li>
          <li><a href="allcomplaints.php"><i class="fas fa-clipboard-list"></i> All Complaints</a></li>
          <li><a href="unsolvedcomplaint.php"><i class="fas fa-exclamation-circle"></i> Unresolved</a></li>
          <li><a href="#"><i class="fas fa-check-circle"></i> Resolved</a></li>
          <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
          <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
      <!-- Content -->
      <!-- <div class="col-md-9 col-lg-10">
        <h2>Welcome to Complaint Management Admin Panel</h2>
        <div class="complaints-table">
          <h3>All Complaints</h3>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Submitted By</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Internet Connection Issue</td>
                <td>John Doe</td>
                <td>Unresolved</td>
                <td><a href="#">View Details</a></td>
              </tr>
              Add more rows for other complaints
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

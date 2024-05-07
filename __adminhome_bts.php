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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
 
        
<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 250px; height:100vh; margin-top:-45px;">
    <a  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="admindashboard.php" class="nav-link active" aria-current="page"><i class="fas fa-home"></i>
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Dashboars
        </a>
      </li>
      <li>
        <a href="adminusers.php" class="nav-link link-body-emphasis"><i class="fas fa-user"></i>
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Users
        </a>
      </li>
      <li>
        <a href="adminmanager.php" class="nav-link link-body-emphasis"><i class="fas fa-user"></i>
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Managers
        </a>
      </li>
      <li>
        <a href="addadmin.php" class="nav-link link-body-emphasis"><i class="fas fa-sign-out-alt"></i>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Add admin
        </a>
      </li>
      <li>
        <a href="allcomplaints.php" class="nav-link link-body-emphasis"><i class="fas fa-clipboard-list"></i>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          All complaints
        </a>
      </li>
      <li>
        <a href="unsolvedcomplaint.php" class="nav-link link-body-emphasis"><i class="fas fa-exclamation-circle"></i> 
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Unresolved
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis"><i class="fas fa-check-circle"></i>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Resolved
        </a>
      </li>
      <li>
        <a href="logout.php" class="nav-link link-body-emphasis"><i class="fas fa-sign-out-alt"></i>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Logout
        </a>
      </li>

    </ul>
    <hr>
    
  </div>


        
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

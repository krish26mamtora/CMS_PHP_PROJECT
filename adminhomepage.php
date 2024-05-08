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
      /* margin-top:-50px; */
      height:100vh;
      font-size : 20px;
    }
    .sidebar-heading {
      padding: 1rem;
    }
    .sidebar-menu {
      list-style: none;
      padding: 0;
    }
    .sidebar-menu li {
      padding: 0.3rem;
    }
    .sidebar-menu li a {
      color: #fff;
    }
    #on,#tw,#th,#fo,#fi,#si,#se,#ei,#ni,#te,#el,#tw{
      height:40px;
      width:220px;
      text-align:center;
      display:flex;
      justify-content:center;
      align-items:center;
    }
    #on:hover,#tw:hover,#th:hover,#fo:hover,#fi:hover,#si:hover,#se:hover,#ei:hover,#ni:hover,#te:hover,#el:hover,#tw:hover{
      background-color:blue;
    }
     a {
    text-decoration: none !important; /* Remove underline */
    color: inherit !important; /* Inherit color from parent element */
    cursor: pointer !important; /* Set cursor to pointer */
}
   
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 sidebar">
       
        <ul class="sidebar-menu" >
          <li ><div id="on"><a href="admindashboard.php" ><i class="fas fa-home"></i> Dashboard</a></div></li>
          <li><div id="tw"><a href="adminusers.php"><i class="fas fa-user"></i> Users</a></div></li>
          <li><div id="th"><a href="adminmanager.php"><i class="fas fa-user"></i> Managers</a></div></li>
          <li><div id="fo"><a href="addadmin.php"><i class="fas fa-sign-out-alt"></i> Add Admin</a></div></li>
          <li><div id="fi"><a href="add_manager.php"><i class="fas fa-sign-out-alt"></i> Add Manager</a></div></li>
          <li><div id="si"><a href="allcomplaints.php"><i class="fas fa-clipboard-list"></i> All Complaints</a></div></li>
          <li><div id="se"><a href="unsolvedcomplaint.php"><i class="fas fa-exclamation-circle"></i> Unsolved</a></div></li>
          <li><div id="ei"><a href="ongoingcomplaint.php"><i class="fas fa-sign-out-alt"></i> ongoing </a></div></li>
          <li><div id="ni"><a href="solvedcomplaint.php"><i class="fas fa-check-circle"></i> Solved</a></div></li>
          <li><div id="te"><a href="adminsettings.php"><i class="fas fa-cog"></i> Settings</a></div></li>
          <li><div id="el"><a href="adddepartment.php"><i class="fas fa-cog"></i> Add Department</a></div></li>
          <li><div id="tw"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></div></li>
        </ul>
      </div>
 
  
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
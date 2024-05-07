<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles here */
    body {
      padding-top: 70px;
    }
    .sidebar {
      background-color: #f8f9fa;
      border-right: 1px solid #dee2e6;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Complaint Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Complaints</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Analytics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 sidebar">
      <h4>Quick Links</h4>
      <ul class="list-unstyled">
        <li><a href="#">New Complaint</a></li>
        <li><a href="#">Search Complaint</a></li>
        <li><a href="#">Resolved Complaints</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
    </div>
    <div class="col-md-9">
      <h2>Recent Complaints</h2>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Complaint #001</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget odio ut mi fermentum pharetra.</p>
          <a href="#" class="btn btn-primary">View Details</a>
        </div>
      </div>
      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">Complaint #002</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget odio ut mi fermentum pharetra.</p>
          <a href="#" class="btn btn-primary">View Details</a>
        </div>
      </div>
      <!-- More recent complaints cards can be added here -->
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

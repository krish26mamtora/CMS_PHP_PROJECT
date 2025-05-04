<?php
session_start();
$loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IWT</title>
    <link rel="stylesheet" href="/CMS/styles/nav_common.css">
  </head>
  <body>
    <nav class="custom-navbar">
      <div class="nav-container">
        <a class="navbar-brand" href="#">CMS</a>
        <button class="navbar-toggler" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse">
          <ul class="navbar-nav">
            <?php if (!$loggedin): ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="welcome.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="User_login.php">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Admin_login.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Manager_login.php">Manager</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      document.querySelector('.navbar-toggler').addEventListener('click', function() {
        document.querySelector('.navbar-collapse').classList.toggle('show');
      });
    </script>
  </body>
</html>

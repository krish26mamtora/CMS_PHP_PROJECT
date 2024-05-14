<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CMS</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/CMS.jpg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<body id="top" style="margin-top:100px;">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
      <div class="container">

        <a href="tel:+01123456790" class="helpline-box">

         
          

        </a>

        <a href="#" class="logo">
          <!-- <img src="./assets/images/CMS.jpg" height="60px" alt="CMS logo"> -->
        </a>
     

      </div>
    </div>

    <div class="header-bottom">
      <div class="container">

       
        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="./assets/images/logo-blue.svg" alt="Tourly logo">
            </a>

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          

        </nav>

        <!-- <button class="btn btn-primary ">Book Now</button> -->

      </div>
    </div>

  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title" style="color:white; font-size: 50px;">Complaint Management System</h2>
    

          <p class="hero-text">
            "Welcome to our Complaint Management System dashboard, where you can submit, track, and resolve complaints efficiently."
          </p>

          <div class="btn-group">
            <button class="btn btn-primary" id="gotologin">Login</button>
            <script>
               document.getElementById('gotologin').addEventListener('click', function() {
                window.location.href = 'User_login.php'; // Redirect to login.php
    });
            </script>

          </div>

        </div>
      </section>





      <!-- 
        - #TOUR SEARCH
      -->

      




     
      <section class="popular" id="destination">
        <div class="container">

          <!-- <p class="section-subtitle">sides</p> -->

          <h2 class="h2 section-title" id="features">Three Sides</h2>

          <p class="section-text">
            Effective communication and collaboration among users, admins, and managers are essential for the success of a complaint management system. 
          </p>

          <ul class="popular-list">

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/user_stand.jpg" alt="user" loading="lazy">
                </figure>

                <div class="card-content">

                
                 

                  <h3 class="h3 card-title">
                    <a href="#">User Side</a>
                  </h3>


                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/admin.jpg" alt="admin" loading="lazy">
                </figure>

                <div class="card-content">

                


                  <h3 class="h3 card-title">
                    <a href="#">Admin</a>
                  </h3>

               
                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/task.jpg" alt="task" loading="lazy">
                </figure>

                <div class="card-content">

               

                  <h3 class="h3 card-title">
                    <a href="#">Manager</a>
                  </h3>


                </div>

              </div>
            </li>

          </ul>

          <!-- <button class="btn btn-primary">More destintion</button> -->

        </div>
      </section>





         </article>
  </main>







  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
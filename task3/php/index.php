<?php
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>SSV </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <link rel="stylesheet" href="../css/index.css?v=<?php echo time(); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Nav Bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand ml-auto " href="#" >SSV INSTITUTIONS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-controls="mynavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item firstnav">
          <a class="nav-link active" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./adminlogin.php">Admin Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./studentlogin.php">Student Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="body_content">
        <h1>Welcome to SSV INSTITUTIONS</h1>
        <p>Your journey towards success begins here</p>
        <h2>About SSV INSTITUTIONS</h2>
        <p>SSV INSTITUTIONS is one of the most prestigious institutions in and around the country.</p>
        <p>We are one of the leading members contributing towards the country's research and development</p>
        <h2>Courses Offered</h2>
        <p>We offer large variety of courses including both Engineering and Arts and Sciences</p>
        <p>The Courses we offer are included here</p>
        <ul class="courses" >
            <li>Computer Science and Engineering</li>
            <li>Mechanical Engineering</li>
            <li>Chemical Engineering</li>
            <li>Electrical and Electronics Engineering</li>
        </ul>
    </div>



</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <title>SSV </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <link rel="stylesheet" href="../css/adminlogin.css?v=<?php echo time(); ?>">
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
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./adminlogin.php">Admin Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./studentlogin.php">Student Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="heading">
    <h1>Admin Login</h1>
</div>
    <!--Admin Login Form-->
    <div class="admin_form col-md-6  " >
    <div class="mb-3">        
        <form action="" method="POST"  >
    <label for="uname" class="form-label">Username or email</label>
    <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter your Username">
    </div>
    <div class="mb-3">
    <label for="pwd" class="form-label">Password</label>
    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter your password">
    </div>
    <input type="submit" class="btn btn-success col-sm-5 offset-3"  value="Login" name="admin_login"  />
        </div>
</form>
</body>
</html>
<?php
    if(isset($_POST['admin_login'])){
        include './dbconnection.php';
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        //Checking the credentials
        $check_credential = "SELECT COUNT(*) FROM admins WHERE username='{$uname}' AND password = '{$pwd}' ";
        $process_check_credential = mysqli_query($dbconn,$check_credential);
        if(intval($process_check_credential) == 1){
            echo "<script>
            alert('Admin Logged In successfully');
            window.location.href = './adminportal.php';
            </script>";
        }
        else{
            echo "<script>
            alert('Invalide Credentials');
            window.location.href = './adminlogin.php';
            </script>";
        }
    }
    

?>
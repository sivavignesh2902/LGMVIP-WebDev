<!doctype html>
<html lang="en">
  <head>
    <title>Admin Portal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/adminportal.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <div class="display_stu">
    <nav class="navbar navbar-dark bg-dark">
      <span class="navbar-brand mb-0 h1">Admin Portal</span>
      <div class="nav-item">
            <button class="btn btn-large btn-danger" onclick="logout()" >Logout</button>
        </div>
    </nav>
    <h2>Student Details</h2>
    <table class="table table-light table-striped table-bordered">
        <tr>
          <th>Name</th>
          <th>email</th>
          <th>username</th>
          <th>Assessement 1</th>
          <th>Assessement 2</th>
          <th>End Sem</th>
        </tr>
        <tbody>
          <?php
          include './dbconnection.php';
          $get_stu = mysqli_query($dbconn,"SELECT * FROM students");
          if(mysqli_num_rows($get_stu) > 0 ){
            while($stu = mysqli_fetch_array($get_stu)){
              echo "<tr>";
              echo "<td>{$stu['name']}</td>";
              echo "<td>{$stu['email']}</td>";
              echo "<td>{$stu['username']}</td>";
              if($stu['internal_assessment1'] == 'NOT YET RELEASED'){
                echo "<td><a class='publish'  href='./publishresults.php?stu_username={$stu['username']}&exam=assess1 '>Publish Results</a></td>";
              }
              else{
                echo "<td><a class='modify' href='./modifyresults.php?stu_username={$stu['username']}&exam=assess1 '>Modify Results</a></td>";
              }



              if($stu['internal_assessment2'] == 'NOT YET RELEASED'){
                echo "<td><a class='publish' href='./publishresults.php?stu_username={$stu['username']}&exam=assess2 '>Publish Results</a></td>";
              }
              else{
                echo "<td><a class='modify' href='./modifyresults.php?stu_username={$stu['username']}&exam=assess2 '>Modify Results</a></td>";
              }
              if($stu['endsem'] == 'NOT YET RELEASED'){
                echo "<td><a class='publish' href='./publishresults.php?stu_username={$stu['username']}&exam=endsem '>Publish Results</a></td>";
              }
              else{
                echo "<td><a class='modify' href='./modifyresults.php?stu_username={$stu['username']}&exam=endsem '>Modify Results</a></td>";
              }
              echo "</tr>";
            }
          }          
          ?>
        </tbody>
    </table>
  </div> 
  <script type="text/javascript" >
    function logout(){
        var log = confirm("You are about to logout?");
        if(log){
            window.location.href='./adminlogin.php';
        }
        else{
            null
        }
    }
</script>
  </body>
</html>
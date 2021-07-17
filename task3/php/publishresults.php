<?php
    $stu_username = $_GET['stu_username']; 
    $exam = $_GET['exam'];  
    if($exam == 'assess1'){
      $exam_name = "Internal Assessment 1";
    }
    elseif($exam == 'assess2'){
      $exam_name = "Internal Assessment 2";
    }
    elseif($exam == 'endsem'){
      $exam_name = "End Semester Examination";
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Publish Result</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/publishresults.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <h1>Publish Results</h1>
    <p>Examination : <?php echo $exam_name; ?></p>
    <h2>Student Username  :   <?php echo $stu_username; ?></h2>
    <form method="POST">
    <table class="table table-striped table-primary col-sm-4" >
        <tr>
            <td>Subject 1</td>
            <td>:</td>
            <td><input type="number" placeholder="Out of 100" name="sub1"/></td>
        </tr>
        <tr>
            <td>Subject 2</td>
            <td>:</td>
            <td><input type="number" placeholder="Out of 100" name="sub2" /></td>
        </tr>
        <tr>
            <td>Subject 3</td>
            <td>:</td>
            <td><input type="number" placeholder="Out of 100" name="sub3" name="sub3" /></td>
        </tr>
        <tr>
            <td>Subject 4</td>
            <td>:</td>
            <td><input type="number" placeholder="Out of 100" name="sub4" name="sub4" /></td>
        </tr>
        <tr>
            <td>Subject 5</td>
            <td>:</td>
            <td><input type="number" placeholder="Out of 100" name="sub5" name="sub5" /></td>
        </tr>
        <tr>
          <th colspan="3" ><input type="submit" class="btn btn-success btn-large"  value="Publish" name="publish"  /></th>
        </tr>
    </table>
    </form>



</body>
</html>
<?php
if(isset($_POST['publish'])){
  include './dbconnection.php';
  $sub1 = $_POST['sub1'];
  $sub2 = $_POST['sub2'];
  $sub3 = $_POST['sub3'];
  $sub4 = $_POST['sub4'];
  $sub5 = $_POST['sub5'];
  if($exam == 'endsem'){ 
      $publish_query = "INSERT INTO endsem (username,sub1,sub2,sub3,sub4,sub5) VALUES ('{$stu_username}','{$sub1}','{$sub2}','{$sub3}','{$sub4}','{$sub5}')";
        $publish_mark = mysqli_query($dbconn,$publish_query);    
        if($publish_mark) {
          $change_status = "UPDATE students SET endsem = 'PUBLISHED' WHERE username = '{$stu_username}'  ";
          $process_status = mysqli_query($dbconn,$change_status);
          if($process_status){
            echo "Status Changed Successfully";
          }
          else{
            echo "Status UnChanged Successfully";
          }
          echo "<script>alert('Result Published Successfully'); 
          window.location.href='./adminportal.php';
          </script>";
      }
      else{
        echo "<script>alert('Unable to publish Result'); 
        window.location.href='./adminportal.php';
        </script>";
      }
    }
  elseif($exam == 'assess1'){

    $publish_query = "INSERT INTO assess_1 (username,sub1,sub2,sub3,sub4,sub5) VALUES ('{$stu_username}','{$sub1}','{$sub2}','{$sub3}','{$sub4}','{$sub5}')";
      $publish_mark = mysqli_query($dbconn,$publish_query);    
      if($publish_mark) {
        $change_status = "UPDATE students SET internal_assessment1 = 'PUBLISHED' WHERE username = '{$stu_username}'  ";
        $process_status = mysqli_query($dbconn,$change_status);
        if($process_status){
          echo "Status Changed Successfully";
        }
        else{
          echo "Status UnChanged Successfully";
        }
        echo "<script>alert('Result Published Successfully'); 
        window.location.href='./adminportal.php';
        </script>";
    }
    else{
      echo "<script>alert('Unable to publish Result'); 
      window.location.href='./adminportal.php';
      </script>";
    }
  }
  elseif($exam == 'assess2'){

    $publish_query = "INSERT INTO asses_2 (username,sub1,sub2,sub3,sub4,sub5) VALUES ('{$stu_username}','{$sub1}','{$sub2}','{$sub3}','{$sub4}','{$sub5}')";
      $publish_mark = mysqli_query($dbconn,$publish_query);    
      if($publish_mark) {
        $change_status = "UPDATE students SET internal_assessment2 = 'PUBLISHED' WHERE username = '{$stu_username}'  ";
        $process_status = mysqli_query($dbconn,$change_status);
        if($process_status){
          echo "Status Changed Successfully";
        }
        else{
          echo "Status UnChanged Successfully";
        }
        echo "<script>alert('Result Published Successfully'); 
        window.location.href='./adminportal.php';
        </script>";
    }
    else{
      echo "<script>alert('Unable to publish Result'); 
      window.location.href='./adminportal.php';
      </script>";
    }
  }
}
?>
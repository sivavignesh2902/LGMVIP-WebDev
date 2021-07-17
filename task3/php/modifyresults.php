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
    include './dbconnection.php';
    if($exam == 'endsem'){
      $fetch_marks = "SELECT * FROM endsem WHERE username = '{$stu_username}' ";
      }
      elseif($exam == 'assess1'){
        $fetch_marks = "SELECT * FROM assess_1 WHERE username = '{$stu_username}' ";
        }
        elseif($exam == 'assess2'){
          $fetch_marks = "SELECT * FROM assess_2 WHERE username = '{$stu_username}' ";
          }
      $process_fetch_marks = mysqli_query($dbconn,$fetch_marks);
      if($process_fetch_marks){
        while($mark = mysqli_fetch_array($process_fetch_marks)){
          $subject1 = $mark['sub1'];
          $subject2 = $mark['sub2'];
          $subject3 = $mark['sub3'];
          $subject4 = $mark['sub4'];
          $subject5 = $mark['sub5'];
        }
      }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Publish Result</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="../css/modifyresults.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <h1>Modify Results</h1>
    <p>Examination : <?php echo $exam_name; ?></p>
    <h2>Student Username  :   <?php echo $stu_username; ?></h2>
    <form method="POST">
    <table class="table table-striped table-primary col-sm-4">
        <tr>
            <td>Subject 1</td>
            <td>:</td>
            <td><input type="number" name="sub1" value="<?php echo $subject1; ?>" /></td>
        </tr>
        <tr>
            <td>Subject 2</td>
            <td>:</td>
            <td><input type="number" name="sub2" value="<?php echo $subject2; ?>" /></td>
        </tr>
        <tr>
            <td>Subject 3</td>
            <td>:</td>
            <td><input type="number" name="sub3" name="sub3" value="<?php echo $subject3; ?>" /></td>
        </tr>
        <tr>
            <td>Subject 4</td>
            <td>:</td>
            <td><input type="number" name="sub4" name="sub4" value="<?php echo $subject4; ?>" /></td>
        </tr>
        <tr>
            <td>Subject 5</td>
            <td>:</td>
            <td><input type="number" name="sub5" name="sub5" value="<?php echo $subject5; ?>" /></td>
        </tr>
        <tr>
          <th colspan="3" ><input type="submit" value="Update" name="publish"  /></th>
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
    $modify_query = "UPDATE endsem SET sub1= '{$sub1}',sub2= '{$sub2}',sub3= '{$sub3}',sub4= '{$sub4}',sub5= '{$sub5}'  WHERE username= '{$stu_username}' ";
      $modify_mark = mysqli_query($dbconn,$modify_query);
    if($modify_mark) {
      echo "<script>alert('Result Modified Successfully'); 
      window.location.href='./adminportal.php';
      </script>";
    }
    else{
      echo "<script>alert('Unable to Modify Result'); 
      </script>";
    }
  }
  elseif($exam == 'assess1'){
    $modify_query = "UPDATE assess_1 SET sub1= '{$sub1}',sub2= '{$sub2}',sub3= '{$sub3}',sub4= '{$sub4}',sub5= '{$sub5}'  WHERE username= '{$stu_username}' ";
      $modify_mark = mysqli_query($dbconn,$modify_query);
    if($modify_mark) {
      echo "<script>alert('Result Modified Successfully'); 
      window.location.href='./adminportal.php';
      </script>";
    }
    else{
      echo "<script>alert('Unable to Modify Result'); 
      </script>";
    }
  }
  elseif($exam == 'assess2'){
    $modify_query = "UPDATE asses_2 SET sub1= '{$sub1}',sub2= '{$sub2}',sub3= '{$sub3}',sub4= '{$sub4}',sub5= '{$sub5}'  WHERE username= '{$stu_username}' ";
      $modify_mark = mysqli_query($dbconn,$modify_query);
    if($modify_mark) {
      echo "<script>alert('Result Modified Successfully'); 
      window.location.href='./adminportal.php';
      </script>";
    }
    else{
      echo "<script>alert('Unable to Modify Result'); 
      </script>";
    }
  }
}
?>
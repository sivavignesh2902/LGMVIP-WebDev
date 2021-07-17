<?php
    session_start();
    $stu_username = $_SESSION['stu_username'];
    include './dbconnection.php';
    $fetch_Stu = "SELECT * FROM students WHERE username = '{$stu_username}' ";
    $process_fetching = mysqli_query($dbconn,$fetch_Stu);
    while($stu = mysqli_fetch_array($process_fetching)){
        $name = $stu['name'];
        $email = $stu['email'];
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>SSV </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <link rel="stylesheet" href="../css/studentportal.css?v=<?php echo time(); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <nav class="navbar navbar-dark bg-dark">
      <span class="navbar-brand mb-0 h1">Student Portal</span>
        <div class="nav-item">
            Welcome <?php echo $name; ?>
        </div>
        <div class="nav-item">
            <button class="btn btn-large btn-danger" onclick="logout()" >Logout</button>
        </div>
    </nav>
    <div class="chooseExam">
        <h2>Check Results for the year 2021-2022 (even semester)</h2>
        <form action="#" method="POST" class="col-sm-4" >
                <label for="exam">Exam</label>
                <select class="form-control" id="exam" name="examname">
                    <option value="internal_assessment1" >Internal Assessment 1</option>
                    <option value="internal_assessment2" >Internal Assessment 2</option>
                    <option value="endsem" >End Semester</option>
                </select>
                <input type="submit" class="btn btn-success" value="Get Results" name="getresults" >
        </form>
    </div>    
    <script type="text/javascript" >
    function logout(){
        var log = confirm("You are about to logout?");
        if(log){
            window.location.href='./studentlogin.php';
        }
        else{
            null
        }
    }
</script>
</body>
</html>
<?php
    if(isset($_POST['getresults'])){
        include './dbconnection.php';
        $examname = $_POST['examname'];
        $check = "SELECT {$examname}  FROM students WHERE username='{$stu_username}' ";
        $process_check = mysqli_query($dbconn,$check);
        if($process_check){
            if(mysqli_num_rows($process_check) > 0){
                while($stu_chck = mysqli_fetch_array($process_check)){
                    if($stu_chck[$examname] == 'NOT YET RELEASED'){
                        echo "<div class='results_div col-sm-4'>";
                        echo "<h2>Result Not Yet Published</h2>";
                        echo "</div>";
                    }
                    elseif($stu_chck[$examname] == 'PUBLISHED'){
                        if($examname == 'internal_assessment1'){
                            $fetch_res = "SELECT *  FROM assess_1 WHERE username='{$stu_username}' ";
                        }
                        elseif($examname == 'internal_assessment2'){
                            $fetch_res = "SELECT *  FROM asses_2 WHERE username='{$stu_username}' ";
                        }
                        elseif($examname == 'endsem'){
                            $fetch_res = "SELECT *  FROM endsem WHERE username='{$stu_username}' ";
                        }
                        $process_fetch_res = mysqli_query($dbconn,$fetch_res);
                        echo "<div class='result_div'>";
                        echo "<table class='table table-success col-sm-3 table-bordered table-hover '>";
                        echo "<tr><th>Subject</th><th>Marks (out of 100)</th></tr>";
                        if($process_fetch_res){                    
                        while($res = mysqli_fetch_array($process_fetch_res)){
                            echo "<tr>
                            <td>Subject 1</td>
                            <td>{$res['sub1']}</td>
                        </tr>
                        <tr>
                            <td>Subject 2</td>
                            <td>{$res['sub2']}</td>
                        </tr>
                        <tr>
                        <td>Subject 3</td>
                        <td>{$res['sub3']}</td>
                    </tr>
                    <tr>
                    <td>Subject 4</td>
                    <td>{$res['sub4']}</td>
                </tr>
                <tr>
                <td>Subject 5</td>
                <td>{$res['sub5']}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>".(intval($res['sub1'])+intval($res['sub2'])+intval($res['sub3'])+intval($res['sub4'])+intval($res['sub5']))."</td>
            </tr>";
            break;
                        }

                        
                        echo "</table>"; 
                        echo "</div>";
                    }
                    else{
                        echo "Error";
                    }


                }

                }
            }
        }
    }

?>
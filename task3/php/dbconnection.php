<?php
    //DB CONNECTION
    $hostname = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "task3";
    $dbconn = mysqli_connect($hostname,$username,$pwd,$dbname);
    if($dbconn){
        //echo "Successful Connection";
    }
    else{
        //echo "Unsuccessful Connection";
    }
?>
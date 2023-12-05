<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");

if (isset($_POST['acceptbtn'])) {
   
    $username = $_POST['username'];
    $dname = $_POST['dname'];
    $checktime = $_POST['checktime'];
    $vlink = $_POST['video'];


    $query1 = "UPDATE patient_reg SET  doctorname='$dname',checkuptime='$checktime',videolink='$vlink' where username = '".$username."' LIMIT 1";
    $query_run = mysqli_query($con, $query1);

    
    if ($query_run) {
        
        $query2 = "UPDATE patient_reg SET approval = 1 where username = '".$username."' LIMIT 1";
        mysqli_query($con, $query2);
    
        echo '<script> alert("Doctor has been accepted"); </script>';
        header("Location: pendingpatients.php");
    } else {
        echo '<script> alert("Doctor not accepted"); </script>';
    }
}
?>
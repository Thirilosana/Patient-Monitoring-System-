<?php

session_start();
$usrname = $_SESSION['username'];
$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");
$sql = "SELECT fname FROM doctor_reg where username='" . $usrname . "'";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_array($result);
if ($user) {
    $name = $user['fname'];
}

$user_check_query1 = "SELECT username FROM patient_reg where doctorname='" . $name . "'";
$results1 = mysqli_query($con, $user_check_query1);
$user1 = mysqli_fetch_array($results1);
if ($user1) {
    $fname = $user1['username'];
}
$user_check_query2 = "SELECT mobileno FROM patient_reg where doctorname='" . $name . "'";
$user_check_query4 = "SELECT dob FROM patient_reg where doctorname='" . $name . "'";
$user_check_query5 = "SELECT gender FROM patient_reg where doctorname='" . $name . "'";
$user_check_query6 = "SELECT medicalhis FROM patient_reg where doctorname='" . $name . "'";
$user_check_query7 = "SELECT surgery FROM patient_reg where doctorname='" . $name . "'";
$user_check_query8 = "SELECT bloodgrp FROM patient_reg where doctorname='" . $name . "'";
$user_check_query9 = "SELECT carephno FROM patient_reg where doctorname='" . $name . "'";
$user_check_query10 = "SELECT temperature FROM patientdata where patusername='" . $fname . "'";
$user_check_query11 = "SELECT heart_rate FROM patientdata where patusername='" . $fname . "'";
$user_check_query12 = "SELECT bp_diastolic FROM patientdata where patusername='" . $fname . "'";
$user_check_query13 = "SELECT bp_systolic FROM patientdata where patusername='" . $fname . "'";
$user_check_query14 = "SELECT sugar FROM patientdata where patusername='" . $fname . "'";



$results2 = mysqli_query($con, $user_check_query2);
$results4 = mysqli_query($con, $user_check_query4);
$results5 = mysqli_query($con, $user_check_query5);
$results6 = mysqli_query($con, $user_check_query6);
$results7 = mysqli_query($con, $user_check_query7);
$results8 = mysqli_query($con, $user_check_query8);
$results9 = mysqli_query($con, $user_check_query9);
$results10 = mysqli_query($con, $user_check_query10);
$results11 = mysqli_query($con, $user_check_query11);
$results12 = mysqli_query($con, $user_check_query12);
$results13 = mysqli_query($con, $user_check_query13);
$results14 = mysqli_query($con, $user_check_query14);


$user2 = mysqli_fetch_array($results2);
$user4 = mysqli_fetch_array($results4);
$user5 = mysqli_fetch_array($results5);
$user6 = mysqli_fetch_array($results6);
$user7 = mysqli_fetch_array($results7);
$user8 = mysqli_fetch_array($results8);
$user9 = mysqli_fetch_array($results9);
$user10 = mysqli_fetch_array($results10);
$user11 = mysqli_fetch_array($results11);
$user12 = mysqli_fetch_array($results12);
$user13 = mysqli_fetch_array($results13);
$user14 = mysqli_fetch_array($results14);


if ($user2) {
    $mobileno = $user2['mobileno'];
}
if ($user4) {
    $dob = $user4['dob'];
}
if ($user5) {
    $gender = $user5['gender'];
}
if ($user6) {
    $medicalhis = $user6['medicalhis'];
}
if ($user7) {
    $surgery = $user7['surgery'];
}
if ($user8) {
    $bloodgrp = $user8['bloodgrp'];
}
if ($user9) {
    $no = $user9['carephno'];
}
if ($user10) {
    $temp = $user10['temperature'];
}
if ($user11) {
    $hrate = $user11['heart_rate'];
}
if ($user12) {
    $bp1 = $user12['bp_diastolic'];
}
if ($user13) {
    $bp2 = $user13['bp_systolic'];
}
if ($user14) {
    $sugar = $user14['sugar'];
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="doctorprofile/css/style.css">


    <link rel="icon" type="image/png" href="doctorprofile1/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Doctor Profile</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="doctorprofile1/assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

</head>

<body>
    <form action="mypatients.php" method="POST">
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">

                <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
                    <div class="user-logo">
                        <div class="img" style="background-image: url(images/img6.jpg);"></div>
                        <h3>WELCOME</h3>
                    </div>
                </div>
                <ul class="list-unstyled components mb-3">
                    <li>
                        <a href="doctorprofile.php"><span class="fa fa-user-md "></span> My Profile</a>
                    </li>
                    <li class='active'>
                        <a href="mypatients.php"><span class="fa fa-group "></span> My Patients</a>
                    </li>
                    <li>
                        <a href="pendingpatients.php"><span class="fa fa-comments-o "></span> Pending Patients</a>
                    </li>
                    <li>
                        <a href="mailto:<?php '.$mailid.' ?>"><span class="fa fa-phone "></span> Contact</a>
                    </li>
                    <li>
                        <a href="doctorlogin.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
                    </li>
                </ul>

            </nav>


            <script src="doctorprofile/js/jquery.min.js"></script>
            <script src="doctorprofile/js/popper.js"></script>
            <script src="doctorprofile/js/bootstrap.min.js"></script>
            <script src="doctorprofile/js/main.js"></script>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Patient Details</h4>
                                    <!--<p class="card-category">Complete your profile</p>-->
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Patient Name</strong>
                                                <input type="text" value="<?php echo $fname; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Mobile Number</strong>
                                                <input type="text" value="<?php echo $mobileno; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Date Of Birth</strong>
                                                <input type="email" value="<?php echo $dob; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Gender</strong>
                                                <input type="text" value="<?php echo $gender; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Medical History</strong>
                                                <input type="text" value="<?php echo $medicalhis; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Surgery Undergone</strong>
                                                <input type="text" value="<?php echo $surgery; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Blood Group</strong>
                                                <input type="text" value="<?php echo $bloodgrp; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Care-Taker Number</strong>
                                                <input type="text" value="<?php echo $no; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Temperature</strong>
                                                <input type="text" value="<?php echo $temp; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Heart Rate</strong>
                                                <input type="text" value="<?php echo $hrate; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Pressure Diastolic</strong>
                                                <input type="text" value="<?php echo $bp1; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Pressure Systolic</strong>
                                                <input type="text" value="<?php echo $bp2; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Sugar Level</strong>
                                                <input type="text" value="<?php echo $sugar; ?>" class="form-control" disabled>
                                            </div>
                                        </div>

                                    </div>


                                    <button type="submit" class="btn btn-primary pull-right">View Live Data</button>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </form>
</body>

</html>
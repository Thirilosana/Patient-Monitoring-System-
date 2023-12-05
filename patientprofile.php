<?php

session_start();
$usrname = $_SESSION['username'];
$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");

$user_check_query1 = "SELECT fname FROM patient_reg where username='" . $usrname . "'";
$user_check_query2 = "SELECT username FROM patient_reg where username='" . $usrname . "'";
$user_check_query3 = "SELECT mobileno FROM patient_reg where username='" . $usrname . "'";
$user_check_query4 = "SELECT dob FROM patient_reg where username='" . $usrname . "'";
$user_check_query5 = "SELECT height FROM patient_reg where username='" . $usrname . "'";
$user_check_query6 = "SELECT weigh FROM patient_reg where username='" . $usrname . "'";
$user_check_query7 = "SELECT carephno FROM patient_reg where username='" . $usrname . "'";
$user_check_query8 = "SELECT medicalhis FROM patient_reg where username='" . $usrname . "'";
$user_check_query9 = "SELECT  loc FROM patient_reg where username='" . $usrname . "'";
$user_check_query10 = "SELECT email FROM patient_acc where username='" . $usrname . "'";
$user_check_query11 = "SELECT bloodgrp FROM patient_reg where username='" . $usrname . "'";

$results1 = mysqli_query($con, $user_check_query1);
$results2 = mysqli_query($con, $user_check_query2);
$results3 = mysqli_query($con, $user_check_query3);
$results4 = mysqli_query($con, $user_check_query4);
$results5 = mysqli_query($con, $user_check_query5);
$results6 = mysqli_query($con, $user_check_query6);
$results7 = mysqli_query($con, $user_check_query7);
$results8 = mysqli_query($con, $user_check_query8);
$results9 = mysqli_query($con, $user_check_query9);
$results10 = mysqli_query($con, $user_check_query10);
$results11 = mysqli_query($con, $user_check_query11);


$user1 = mysqli_fetch_array($results1);
$user2 = mysqli_fetch_array($results2);
$user3 = mysqli_fetch_array($results3);
$user4 = mysqli_fetch_array($results4);
$user5 = mysqli_fetch_array($results5);
$user6 = mysqli_fetch_array($results6);
$user7 = mysqli_fetch_array($results7);
$user8 = mysqli_fetch_array($results8);
$user9 = mysqli_fetch_array($results9);
$user10 = mysqli_fetch_array($results10);
$user11 = mysqli_fetch_array($results11);


if ($user1) {
    $fname = $user1['fname'];
}
if ($user2) {
    $username = $user2['username'];
}
if ($user3) {
    $mobileno = $user3['mobileno'];
}
if ($user4) {
    $dob = $user4['dob'];
}
if ($user5) {
    $height = $user5['height'];
}
if ($user6) {
    $weigh = $user6['weigh'];
}
if ($user7) {
    $carephno = $user7['carephno'];
}
if ($user8) {
    $medicalhis = $user8['medicalhis'];
}
if ($user9) {
    $loc = $user9['loc'];
}
if ($user10) {
    $email = $user10['email'];
}
if ($user11) {
    $bloodgrp = $user11['bloodgrp'];
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
    <title>Patient Profile</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>


    <!-- CSS Files -->
    <link href="doctorprofile1/assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

</head>

<body>
    <form action="patientprofile.php" method="POST">
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">

                <div class="img bg-wrap text-center py-3" style="background-image: url(images/bg_1.jpg);">
                    <div class="user-logo">
                        <div class="img" style="background-image: url(doctorprofile/images/img10.jpeg);"></div>
                        <h3>WELCOME</h3>
                    </div>
                </div>
                <ul class="list-unstyled components mb-3">
                    <li class="active">
                        <a href="patientprofile.php"><span class="fas fa-user-circle "></span> My Profile</a>
                    </li>
                    <li>
                        <a href="schedule.php"><span class="fas fa-camera"></span>Schedule</a>
                    </li>
                    <li>
                        <a href="selfdata.php"><span class="fas fa-thermometer"></span>Self Analysis</a>
                    </li>
                    <li>
                        <a href="mailto:<?php '.$mailid.' ?>"><span class="fa fa-phone "></span> Contact</a>
                    </li>
                    <li>
                        <a href="patientlogin.php"><span class="fas fa-arrow-left"></span> Sign Out</a>
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
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">My Profile</h4>
                                    <!--<p class="card-category">Complete your profile</p>-->
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Name</strong>
                                                <input type="text" value="<?php echo $fname; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Username</strong>
                                                <input type="text" value="<?php echo $username; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Email
                                                    address</strong>
                                                <input type="email" value="<?php echo $email; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Mobile
                                                    Number</strong>
                                                <input type="text" value="<?php echo $mobileno; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Date Of
                                                    Birth</strong>
                                                <input type="text" value="<?php echo $dob; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Blood Group</strong>
                                                <input type="text" value="<?php echo $bloodgrp; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating" label class="bmd-label-floating">Height</strong>
                                                <input type="text" value="<?php echo $height; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating" class="bmd-label-floating">Weight</strong>
                                                <input type="text" value="<?php echo $weigh; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Caretaker Mobile
                                                    Number</strong>
                                                <input type="text" value="<?php echo $carephno; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Medical
                                                    History</strong>
                                                <input type="text" value="<?php echo $medicalhis ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Address</strong>
                                                <input type="text" value="<?php echo $loc; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                                       <div class="clearfix"></div>-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

</body>

</html>
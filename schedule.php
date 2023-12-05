<?php

session_start();
$usrname = $_SESSION['username'];
$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");

$user_check_query1 = "SELECT doctorname FROM patient_reg where username='" . $usrname . "'";
$results1 = mysqli_query($con, $user_check_query1);
$user1 = mysqli_fetch_array($results1);
if ($user1) {
    $fname = $user1['doctorname'];
}
$user_check_query2 = "SELECT username FROM doctor_reg where fname='" . $fname . "'";
$results2 = mysqli_query($con, $user_check_query2);
$user2 = mysqli_fetch_array($results2);
if ($user2) {
    $username = $user2['username'];
}
$user_check_query3 = "SELECT mobileno FROM doctor_reg where fname='" . $fname . "'";
$user_check_query4 = "SELECT  mailid FROM doctor_acc where username ='" . $username . "'";
$user_check_query5 = "SELECT gender FROM doctor_reg where fname='" . $fname . "'";
$user_check_query6 = "SELECT dob FROM doctor_reg where fname='" . $fname . "'";
$user_check_query7 = "SELECT speciality FROM doctor_reg where fname='" . $fname . "'";
$user_check_query8 = "SELECT place FROM doctor_reg where fname='" . $fname . "'";
$user_check_query9 = "SELECT  checkuptime FROM patient_reg where username='" . $usrname . "'";
$user_check_query10 = "SELECT videolink FROM patient_reg where username='" . $usrname . "'";


$results3 = mysqli_query($con, $user_check_query3);
$results4 = mysqli_query($con, $user_check_query4);
$results5 = mysqli_query($con, $user_check_query5);
$results6 = mysqli_query($con, $user_check_query6);
$results7 = mysqli_query($con, $user_check_query7);
$results8 = mysqli_query($con, $user_check_query8);
$results9 = mysqli_query($con, $user_check_query9);
$results10 = mysqli_query($con, $user_check_query10);

$user3 = mysqli_fetch_array($results3);
$user4 = mysqli_fetch_array($results4);
$user5 = mysqli_fetch_array($results5);
$user6 = mysqli_fetch_array($results6);
$user7 = mysqli_fetch_array($results7);
$user8 = mysqli_fetch_array($results8);
$user9 = mysqli_fetch_array($results9);
$user10 = mysqli_fetch_array($results10);


if ($user3) {
    $mobileno = $user3['mobileno'];
}
if ($user4) {
    $mailid = $user4['mailid'];
}
if ($user5) {
    $gender = $user5['gender'];
}
if ($user6) {
    $dob = $user6['dob'];
}
if ($user7) {
    $speciality = $user7['speciality'];
}
if ($user8) {
    $place = $user8['place'];
}
if ($user9) {
    $checktime = $user9['checkuptime'];
}
if ($user10) {
    $videolink = $user10['videolink'];
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

    <form action="selfdata.php" method="POST">
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">

                <div class="img bg-wrap text-center py-3" style="background-image: url(images/bg_1.jpg);">
                    <div class="user-logo">
                        <div class="img" style="background-image: url(doctorprofile/images/img10.jpeg);"></div>
                        <h3>WELCOME</h3>
                    </div>
                </div>
                <ul class="list-unstyled components mb-3">
                    <li>
                        <a href="patientprofile.php"><span class="fas fa-user-circle "></span> My Profile</a>
                    </li>
                    <li class='active'>
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
                                                <strong style="font-size:20px;" class="bmd-label-floating">Doctor Assigned</strong>
                                                <input type="text" value="<?php echo $fname; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Doctor Username</strong>
                                                <input type="text" value="<?php echo $username; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Doctor Phone Number</strong>
                                                <input type="text" value="<?php echo $mobileno; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Doctor Mail Id</strong>
                                                <input type="text" value="<?php echo $mailid; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Gender</strong>
                                                <input type="text" value="<?php echo $gender; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Date Of Birth</strong>
                                                <input type="text" value="<?php echo $dob; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Speciality</strong>
                                                <input type="text" value="<?php echo $speciality; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Hospital Location</strong>
                                                <input type="text" value="<?php echo $place; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Check-up Time</strong>
                                                <input type="text" value="<?php echo $checktime; ?>" class="form-control" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Video Link</strong>
                                                <input type="text" value="<?php echo $videolink; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
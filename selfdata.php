<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
$usrname = $_SESSION['username'];
$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");

$user_check_query1 = "SELECT fname FROM patient_reg where username='" . $usrname . "'";
$user_check_query2 = "SELECT username FROM patient_reg where username='" . $usrname . "'";
$user_check_query3 = "SELECT bloodgrp FROM patient_reg where username='" . $usrname . "'";
$user_check_query4 = "SELECT surgery FROM patient_reg where username='" . $usrname . "'";
$user_check_query5 = "SELECT temperature FROM patientdata where patusername='" . $usrname . "'";
$user_check_query6 = "SELECT heart_rate FROM patientdata where patusername='" . $usrname . "'";
$user_check_query7 = "SELECT bp_diastolic FROM patientdata where patusername='" . $usrname . "'";
$user_check_query8 = "SELECT bp_systolic FROM patientdata where patusername='" . $usrname . "'";
$user_check_query9 = "SELECT  sugar FROM patientdata where patusername='" . $usrname . "'";
$user_check_query10 = "SELECT medicalhis FROM patient_reg where username='" . $usrname . "'";


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


if ($user1) {
    $fname = $user1['fname'];
}
if ($user2) {
    $username = $user2['username'];
}
if ($user3) {
    $bloodgrp = $user3['bloodgrp'];
}
if ($user4) {
    $surgery = $user4['surgery'];
}
if ($user5) {
    $temperature = $user5['temperature'];
}
if ($user6) {
    $rate = $user6['heart_rate'];
}
if ($user7) {
    $bp1 = $user7['bp_diastolic'];
}
if ($user8) {
    $bp2 = $user8['bp_systolic'];
}
if ($user9) {
    $sugar = $user9['sugar'];
}
if ($user10) {
    $medichis = $user10['medicalhis'];
}

if($temperature > 99)
{


include './gmail/vendor/autoload.php';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'muthubrindha15@gmail.com';
$mail->Password = 'brindha15032001';
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;
$mail->setFrom('muthubrindha15@gmail.com', 'Brindha');
$mail->addAddress('muthubrindha15@gmail.com');
$mail->Subject = 'ALERT!!';
$mail->Body = 'The patient temperature has raised';
if(!$mail->send())
{
$error = "Mailer Error: " .$mail->ErrorInfo;
echo "<div class=display> '.$error.'  </div>";
}
else
{
//echo " <div class=display> Message Sent </div>";
}
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
                    <li>
                        <a href="schedule.php"><span class="fas fa-camera"></span>Schedule</a>
                    </li>
                    <li class='active'>
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
                                    <h4 class="card-title">Self-Analysis Data</h4>
                                    <!--<p class="card-category">Complete your profile</p>-->
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Name</strong>
                                                <input type="text" value="<?php echo $fname; ?>" class="form-control">
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
                                                <strong style="font-size:20px;" class="bmd-label-floating">Blood Group</strong>
                                                <input type="text" value="<?php echo $bloodgrp; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Surgery Undergone</strong>
                                                <input type="text" value="<?php echo $surgery; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Temperature</strong>
                                                <input type="text" value="<?php echo $temperature; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Heart Beat Rate</strong>
                                                <input type="text" value="<?php echo $rate; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Blood Pressure Diastolic</strong>
                                                <input type="text" value="<?php echo $bp1; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px;" class="bmd-label-floating">Blood Pressure Systolic</strong>
                                                <input type="text" value="<?php echo $bp2; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Sugar Level</strong>
                                                <input type="text" value="<?php echo $sugar; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong style="font-size:20px" class="bmd-label-floating">Medical History</strong>
                                                <input type="text" value="<?php echo $medichis ?>" class="form-control" disabled>
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
        </div>
    </form>
</body>
</html>
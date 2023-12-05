<?php
session_start();

$errors = array();

$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");

if (isset($_POST['username'])) {

    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_login WHERE username='" . $uname . "'AND password='" . $password . "'";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {

        header('location: doctortable.php');
    } else {
        array_push($errors, "Incorrect username or password");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link href="loginadmin.css" rel="stylesheet" media="all">
</head>

<body>

    <div id="form_wrapper">
        <div id="form_left">
            <img src="../images/img14.jpg" alt="login admin" width="500" height="400">
        </div>
        <form action="loginadmin.php" method="POST">
            <div id="form_right">
                <h1><b>ADMIN LOGIN</b></h1>
                <div class="input_container">
                    <i class="fas fa-envelope"></i>
                    <input placeholder="Username" type="text" name="username" id="field_email" class='input_field'>
                </div>
                <div class="input_container">
                    <i class="fas fa-lock"></i>
                    <input placeholder="Password" type="password" name="password" id="field_password" class='input_field'>
                </div>
                <input type="submit" value="Login" id='input_submit' class='input_field'>
                <?php include('errors.php') ?>


            </div>
        </form>
    </div>
</body>
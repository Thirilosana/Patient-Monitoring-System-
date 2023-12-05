<?php

$errors = array();
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    /*if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }*/
    $user_check_query = "SELECT * FROM patient_acc WHERE username='" . $username . "'AND pswd ='" . $password . "' LIMIT 1";;

    $results = mysqli_query($con, $user_check_query);

    if (mysqli_num_rows($results) > 0) {

        $_SESSION['username'] = $username;
        header('location: patientprofile.php');
    } else {
        array_push($errors, "Incorrect username or password");
    }
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link href="plogin.css" rel="stylesheet" media="all">
</head>

<body>

    <div id="form_wrapper">
        <div id="form_left">
            <img src="images/img11.jpg" alt="computer icon">
        </div>
        <form action="patientlogin.php" method="POST">
            <div id="form_right">
                <h1>Patient Login</h1>
                <div class="input_container">
                    <i class="fas fa-envelope"></i>
                    <input placeholder="Username" type="text" name="username" class='input_field'required>
                </div>
                <div class="input_container">
                    <i class="fas fa-lock"></i>
                    <input placeholder="Password" type="password" name="password" class='input_field'required>
                </div>
                <input type="submit" value="Login" id='input_submit' class='input_field'>
                <?php include('errors.php') ?>
                <span id='create_account'>
                    <a href="accpatient.php">Create your account ➡ </a>
                </span>
                
            </div>
        </form>
    </div>

</body>

</html>
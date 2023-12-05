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
    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }
    $user_check_query = "SELECT * FROM doctor_acc WHERE username ='" . $username . "' AND pswd ='" . $password . "' LIMIT 1";;

    $results = mysqli_query($con, $user_check_query);

    $user = mysqli_fetch_assoc($results);

    if ($user) {

        $user_check_query1 = "SELECT username, approval from doctor_reg  where username ='".$username."' AND approval = 1 LIMIT 1";

        $result = mysqli_query($con, $user_check_query1);
        if (mysqli_num_rows($result) > 0){
            
            $_SESSION['username']=$username;
            header('location: doctorprofile.php');
            exit();
        }
        else{
            array_push($errors, "Approval is not given by the admin");
        }
    }
    else{
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
    <link href="doctorlogin.css" rel="stylesheet" media="all">
</head>

<body>

    <div id="form_wrapper">
        <div id="form_left">
            <img src="images/img12.jpg" alt="computer icon">
        </div>
        <form action="doctorlogin.php" method="POST">
            <div id="form_right">
                <h1>Doctor Login</h1>
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
                    <a href="doctoracc.php">Create your account ➡ </a>
                </span>
            </div>
        </form>
    </div>

</body>

</html>
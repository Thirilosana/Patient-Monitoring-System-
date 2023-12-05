<?php
session_start();
$errors = array();

$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");
if (isset($_POST['fname'])) {
    $name = $_POST['fname'];
    $email = $_POST['mail'];
    $userid = $_POST['uid'];
    $username = $_POST['uname'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    /*if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Mail ID is required");
    }
    if (empty($userid)) {
        array_push($errors, "Unique ID is required");
    }
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($pass1)) {
        array_push($errors, "Password is required");
    }*/
    if ($pass1 != $pass2) {
        array_push($errors, "Passwords do not match");
    }

    $user_check_query1 = "SELECT * FROM patient_unique where userid ='" . $userid . "' and validno = 0 LIMIT 1";

    $result = mysqli_query($con, $user_check_query1);

    $user_check_query2 = "SELECT * FROM patient_acc where username ='" . $username . "' OR email ='" . $email . "' LIMIT 1";

    $results = mysqli_query($con, $user_check_query2);
    $user = mysqli_fetch_assoc($results);

    if ($user) {

        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
            array_push($errors, "This email id already has a registered username");
        }
    }

    if (mysqli_num_rows($result) == 0) {
        array_push($errors, "Enter a valid userid");
    }
    if (count($errors) == 0) {

        $query1 = "INSERT INTO patient_acc (fname, email, uniqueid, username, pswd) values ('$name', '$email', '$userid', '$username', '$pass1')";

        $query2 = "UPDATE patient_unique SET validno = 1 WHERE userid = '" . $userid . "'";

        mysqli_query($con, $query1);
        mysqli_query($con, $query2);
        header('location: patientreg.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>COVID-19</title>
    <link rel="stylesheet" href="accpatient.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>

<body>
    <img src="images/img15.jpeg" alt="image 2" width="800" height="700">

    <form class="box" action="accpatient.php" method="post">
        <?php include('errors.php') ?>
        <h1>Patient Registration</h1>
        <input type="text" name="fname" placeholder="Name" required>
        <input type="text" name="mail" placeholder="Mail id" id="myEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        <input type="text" name="uid" placeholder="Unique id" required>
        <input type="text" name="uname" placeholder="Username" required>
        <input type="password" name="pass1" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" placeholder="Password" required>
        <input type="password" name="pass2" placeholder="Confirm Password" required>
        <input type="submit" name="" placeholder="Submit">
        <a href="patientlogin.php" class="signup-image-link">I am already member</a>
    </form>

    <script>
       
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            }
            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            }
            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            }
            // Validate length
            if (myInput.value.length >= 5) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            }
        }
    </script>

</body>

</html>
<?php
session_start();
$errors = array();

$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");
if (isset($_POST['username'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if (empty($name)) {
        array_push($errors, "username is required");
    }
    if (empty($email)) {
        array_push($errors, "Mail ID is required");
    }
    if (empty($pass1)) {
        array_push($errors, "Password is required");
    }
    if ($pass1 != $pass2) {
        array_push($errors, "Passwords do not match");
    }

    $user_check_query = "SELECT * FROM doctor_acc where username ='" . $name . "' OR mailid ='" . $email . "' LIMIT 1";

    $results = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {

        if ($user['username'] === $name) {
            array_push($errors, "Username already exists");
        }
        if ($user['mailid'] === $email) {
            array_push($errors, "This email id already has a registered username");
        }
    }

    if (count($errors) == 0) {

        $query = "INSERT INTO doctor_acc (username, mailid, pswd) values ('$name', '$email', '$pass1')";

        mysqli_query($con, $query);

        header('location: doctorreg.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>COVID-19</title>
    <link rel="stylesheet" href="doctoracc.css">

</head>

<body>
    <img src="images/img16.jpg" alt="signup doctor" width="850" height="700">
    <form class="box" action="doctoracc.php" method="post">
        <?php include('errors.php') ?>
        <h1>Doctor Registration</h1>
        <input type="text" name="username" placeholder="username" required>
        <input type="text" name="email" placeholder="Mail id" id="myEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        <input type="password" name="pass1" placeholder="Password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <input type="password" name="pass2" placeholder="Confirm Password" required>
        <input type="submit" name="" placeholder="Submit">
    </form>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
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
    <!-- JS -->
    <script src="doctormodule1/vendor/jquery/jquery.min.js"></script>
    <script src="doctormodule1/js/main.js"></script>
</body>

</html>
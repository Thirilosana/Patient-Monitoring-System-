<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="doctorprofile/css/style.css">

    <title>Doctor Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<style>
    * {
        font-family: sans-serif;
        /* Change your font family */
    }

    .content-table {
        border-collapse: collapse;
        margin: 170px 20px;
        font-size: 0.9em;
        min-width: 500px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 20);
    }

    .content-table thead tr {
        background-color: #0984e3;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }

    .content-table th,
    .content-table td {
        padding: 20px 20px;
    }

    .content-table tbody tr {
        border-bottom: 1px solid #0984e3;
    }

    .content-table tbody tr:nth-of-type(even) {
        background-color: #0984e3;
    }

    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #0984e3;
    }

    .content-table tbody tr.active-row {
        font-weight: bold;
        color: #0984e3;
    }
</style>

<body>


    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">

            <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
                <div class="user-logo">
                    <div class="img" style="background-image: url(doctorprofile/images/image3.jpg);"></div>
                    <h3>WELCOME</h3>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="doctorprofile.php"><span class="fa fa-user-md "></span> My Profile</a>
                </li>
                <li>
                    <a href="mypatients.php"><span class="fa fa-group "></span> My Patients</a>
                </li>
                <li class='active'>
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


        <div class="wrapper">

            <table class="content-table">
                <thead>

                    <th data-field="name" data-sortable="true">Name</th>
                    <th data-field="username" data-sortable="true">Username</th>
                    <th data-field="mailid" data-sortable="true">Mailid</th>
                    <th data-field="mobile number" data-sortable="true">Mobile Number</th>
                    <th data-field="positivedate" data-sortable="true">Corona Positive Date</th>
                    <th data-field="docname" data-sortable="true">Doctorname</th>
                    <th data-field="checktime" data-sortable="true">Checkup-time</th>
                    <th data-field="videolink" data-sortable="true">Video Link</th>
                    <th data-field="approval">Accept</th>


                </thead>

                <?php

                $host = "localhost";
                $user = "root";
                $password = "";
                $db = "demo";
                $con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");

                $sql = "SELECT patient_reg.fname,patient_reg.username,patient_acc.email,patient_reg.mobileno,patient_reg.admindate,patient_reg.doctorname,patient_reg.checkuptime,patient_reg.videolink from patient_reg join patient_acc where patient_reg.username=patient_acc.username order by approval";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    foreach ($result as $row) {
                ?>

                        <tr>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobileno']; ?></td>
                            <td><?php echo $row['admindate']; ?></td>
                            <td><?php echo $row['doctorname']; ?></td>
                            <td><?php echo $row['checkuptime']; ?></td>
                            <td><?php echo $row['videolink']; ?></td>

                            <td>
                                <button type="button" class="btn btn-success acceptbtn">ACCEPT</button>
                            </td>
                        </tr>

                <?php


                    }
                    echo "</table>";
                } else {

                    echo "0 result";
                }

                $con->close();
                ?>


            </table>
        </div>

        <!--Modal-->
        <div class="modal fade" id="acptmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Doctor Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="updatedoctor.php" method="POST">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" disabled>
                            </div>


                            <input type="hidden" name="username" id="username" class="form-control">


                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="mailid" id="mailid" class="form-control checking_email" disabled>
                                <small class="error_email" style="color: red;"></small>
                            </div>

                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="mobileno" id="mobileno" class="form-control" disabled>
                            </div>

                            <input type="hidden" name="posdate" id="posdate" class="form-control">


                            <div class="form-group">
                                <label>Doctor Name</label>
                                <input type="text" name="dname" id="dname" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Check-up Time</label>
                                <input type="text" name="checktime" id="checktime" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Video Link</label>
                                <input type="text" name="video" id="video" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="acceptbtn" class="btn btn-primary">Accept</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $('.acceptbtn').on('click', function() {

                    $('#acptmodal').modal('show')

                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#fname').val(data[0]);
                    $('#username').val(data[1]);
                    $('#mailid').val(data[2]);
                    $('#mobileno').val(data[3]);
                    $('#posdate').val(data[4]);
                    $('#dname').val(data[5]);
                    $('#checktime').val(data[6]);
                    $('#video').val(data[7]);



                });
            });
        </script>
    </div>
    </form>
</body>

</html>
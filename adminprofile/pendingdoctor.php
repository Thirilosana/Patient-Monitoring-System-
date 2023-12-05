<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Doctor Table</title>
    <link rel="stylesheet" href="adminprofile1.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.js"></script>
</head>
<style>
    * {
        font-family: sans-serif;
        /* Change your font family */
    }

    .content-table {
        border-collapse: collapse;
        margin: 100px 200px;
        font-size: 0.9em;
        min-width: 600px;
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



    <div id='cssmenu'>
        <ul>
            <li class='active'>
                <a href='pendingdoctor.php'><span>Pending Doctor Request</span></a>
            </li>
            <li>
                <a href='doctortable.php'><span>Doctor Profile</span></a>
            </li>
            <li>
                <a href='patienttable.php'><span>Patient Profile</span></a>
            </li>
            <li>
                <a href='pendingpatient.php'><span>Pending Patient Request</span></a>
            </li>
            <li class='last'>
                <a href="loginadmin.php"><span>Sign Out</span></a>
            </li>
        </ul>
    </div>

    <div class="wrapper">

        <table class="content-table">
            <thead>

                <th data-field="name" data-sortable="true">Name</th>
                <th data-field="username" data-sortable="true">Username</th>
                <th data-field="mailid" data-sortable="true">Mailid</th>
                <th data-field="mobile number" data-sortable="true">Mobile Number</th>
                <th data-field="date of birth" data-sortable="true">Date Of Birth</th>
                <th data-field="speciality" data-sortable="true">Speciality</th>
                <th data-field="address" data-sortable="true">Address Of Hospital</th>
                <th data-field="Approval" data-events="operateEvents">Approval</th>


            </thead>

            <?php

            session_start();
            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "demo";
            $con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");

            $sql = "SELECT doctor_reg.fname, doctor_reg.mobileno, doctor_reg.dob, doctor_reg.username, doctor_reg.speciality, doctor_reg.place,doctor_acc.mailid FROM doctor_reg join doctor_acc where doctor_reg.username=doctor_acc.username and doctor_reg.approval = 0";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                foreach ($result as $row) {
            ?>

                    <tr>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['mailid']; ?></td>
                        <td><?php echo $row['mobileno']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['speciality']; ?></td>
                        <td><?php echo $row['place']; ?></td>
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--Modal Form-->
    <div class="modal fade" id="acptmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Doctor Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="fname" id="fname" class="form-control" disabled>
                        </div>


                        <input type="hidden" name="username" id="username" class="form-control">


                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="mailid" class="form-control checking_email" disabled>
                            <small class="error_email" style="color: red;"></small>
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobno" id="mobileno" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Speciality</label>
                            <input type="text" name="speciality" id="speciality" class="form-control" disabled>
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

                $('#acptmodal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#fname').val(data[0]);
                $('#username').val(data[1]);
                $('#mailid').val(data[2]);
                $('#mobileno').val(data[3]);
                $('#dob').val(data[4]);
                $('#speciality').val(data[5]);

            });
        });
    </script>

    <!--End Modal Form-->


</body>

</html>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Patient Table</title>


  <link rel="stylesheet" href="adminprofile1.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="script.js"></script>
  

  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/fresh-bootstrap-table"/>

  <!--  Social tags    -->
  <meta name="keywords" content="creative tim, html table, html css table, web table, freebie, free bootstrap table, bootstrap, css3 table, bootstrap table, fresh bootstrap table, frontend, modern table, responsive bootstrap table, responsive bootstrap table">

  <meta name="description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need.">

  <!-- Open Graph data -->
  <meta property="og:title" content="Fresh Bootstrap Table by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="https://wenzhixin.github.io/fresh-bootstrap-table/full-screen-table.html" />
  <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/31/original/opt_fbt_thumbnail.jpg"/>
  <meta property="og:description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need." />
  <meta property="og:site_name" content="Creative Tim" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
  <link href="assets/css/demo.css" rel="stylesheet" />

  <!--   Fonts and icons   -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.js"></script>


</head>
<body>





<div id='cssmenu'>
      <ul>
         <li>
            <a href='pendingdoctor.php'><span>Pending Doctor Request</span></a>
         </li>
         <li>
            <a href='doctortable.php'>Doctor Profile</a>
         </li>
         <li class='active'>
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

 <div class="fresh-table full-color-azure full-screen-table">
  <!--
    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
  -->
    <table id="fresh-table" class="table">
        <thead>
          
          <th data-field="name" data-sortable="true">Name</th>
          <th data-field="mobile number" data-sortable="true">Mobile Number</th>
          <th data-field="date of birth" data-sortable="true">Date Of Birth</th>
          <th data-field="gender" data-sortable="true">Gender</th>
          <th data-field="Blood Group" data-sortable="true">Blood Group</th>
          <th data-field="Height" data-sortable="true">Height</th>
          <th data-field="Weight" data-sortable="true">Weight</th>
          <th data-field="date" data-sortable="true">Corona Positive Date</th>
          <th data-field="phn no" data-sortable="true">Caretaker Number</th>
          <th data-field="address" data-sortable="true">Address</th>

        </thead>

      <?php
    
           $host = "localhost";
           $user = "root";
           $password = "";
           $db = "demo";
           $con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");

           $sql = "SELECT fname, mobileno, dob, gender, bloodgrp, height, weigh, admindate, carephno, loc FROM patient_reg ";
           $result = $con-> query($sql);

           if($result-> num_rows > 0){
           while($row = $result-> fetch_assoc()){

            echo "<tr><td>".$row["fname"]."</td><td>".$row["mobileno"]."</td><td>".$row["dob"]."</td><td>".$row["gender"]."</td><td>".$row["bloodgrp"]."</td><td>".$row["height"]."</td><td>".$row["weigh"]."</td><td>".$row["admindate"]."</td><td>".$row["carephno"]."</td><td>".$row["loc"]."</td></tr>";
           }
           echo "</table>";
           }
           else{

            echo "0 result";
           }
    
           $con-> close();
        ?>
    </table>
  </div>
</div>

<script>
  var $table = $('#fresh-table')

  window.operateEvents = {
    'click .like': function (e, value, row, index) {
      alert('You click like icon, row: ' + JSON.stringify(row))
      console.log(value, row, index)
    },
    'click .edit': function (e, value, row, index) {
      alert('You click edit icon, row: ' + JSON.stringify(row))
      console.log(value, row, index)
    },
    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      })
    }
  }

  function operateFormatter(value, row, index) {
    return [
      '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
        '<i class="fa fa-heart"></i>',
      '</a>',
      '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
        '<i class="fa fa-edit"></i>',
      '</a>',
      '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
        '<i class="fa fa-remove"></i>',
      '</a>'
    ].join('')
  }

  $(function () {
    $table.bootstrapTable({
      classes: 'table table-hover table-striped',
      toolbar: '.toolbar',

      search: true,
      showRefresh: true,
      showToggle: true,
      showColumns: true,
      pagination: true,
      striped: true,
      sortable: true,
      height: $(window).height(),
      pageSize: 25,
      pageList: [25, 50, 100],

      formatShowingRows: function (pageFrom, pageTo, totalRows) {
        return ''
      },
      formatRecordsPerPage: function (pageNumber) {
        return pageNumber + ' rows visible'
      }
    })
    
    $(window).resize(function () {
      $table.bootstrapTable('resetView', {
        height: $(window).height()
      })
    })
  })

  $('#sharrreTitle').sharrre({
    share: {
      twitter: true,
      facebook: true
    },
    template: '',
    enableHover: false,
    enableTracking: true,
    render: function (api, options) {
      $("#sharrreTitle").html('Thank you for ' + options.total + ' shares!')
    },
    enableTracking: true,
    url: location.href
  })

</script>

</body>

</html>

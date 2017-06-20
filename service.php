<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="stock";
$conn = mysqli_connect("localhost", $username, $password, $database);

$date = date("Y-m-d");

 ob_start();
 session_start();

 if( isset($_SESSION['user']) ) {

  $uid = $_SESSION['user'];

  $q_user = "SELECT name,role from userdb.users WHERE uname='".$uid."'";
            $row_user = $conn->query($q_user);
            $f_user = mysqli_fetch_assoc($row_user);
            $name=$f_user["name"];
            $role=$f_user["role"];
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POS System : Rahman Mobiles</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">
  <link rel="stylesheet" href="rmpos.css">

<link href="plugins/iCheck/square/square.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-purple sidebar-mini fixed">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RAHMAN</b> MOBILES</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/myAvatar.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php if( isset($_SESSION['user']) ) { echo $name;} else{echo "User";} ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/myAvatar.png" class="img-circle" alt="User Image">

                <p>
                  <?php if( isset($_SESSION['user']) ) { echo $name;} else{echo "User";} ?>
                  <small><?php if( isset($_SESSION['user']) ) { echo $role;} else{echo "Staff";} ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <?php
                if( isset($_SESSION['user']) ) {
                echo "<div class=\"pull-left\">
                                  <a href=\"admin/ua\" class=\"btn btn-default btn-flat\">Profile</a>
                                </div>
                                <div class=\"pull-right\">
                                  <a href=\"admin/logout.php?logout\" class=\"btn btn-default btn-flat\">Sign out</a>
                                </div>"; }

                ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="//rmpos.app"><i class="fa fa-cart-plus"></i> <span>Cart</span></a></li>
        <li class="active"><a href=""><i class="fa fa-wrench"></i> <span>Services</span></a></li>
        <li><a href="db.php"><i class="fa fa-book"></i> <span>Stock Book</span></a></li>
        <li><a href="ac"><i class="fa fa-inr"></i> <span>Accounts</span></a></li>
        <li><a href="backup.php"><i class="fa fa-hdd-o"></i> <span>Backup</span></a></li>


        <li class="header">DASHBOARD</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="admin?stockinfo"><i class="fa fa-info"></i> <span>Stock Info</span></a></li>
        <li><a href="admin?salesinfo"><i class="fa fa-area-chart"></i> <span>Sales Info</span></a></li>
        <li><a href="admin?binfo"><i class="fa fa-briefcase"></i> <span>Business Info</span></a></li>

        <li class="header">ADMIN TOOLS</li>
        <li><a href="admin?stockmd"><i class="fa fa-database"></i> <span>Stock Management</span></a></li>
        <li><a href="admin?salehistory"><i class="fa fa-history"></i> <span>Sales History</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Service</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="height: 70vh;">
              <div class="row">

                <div class="col-md-8 border-right">
                  <p class="text-center">
                    <strong>Today Services: <?php echo date("d-M-y") ?></strong>
                  </p>
                  
                  <table id="service" class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Device Name</th>
                      <th>Description</th>
                      <th>Customer Name</th>
                      <th style="text-align:right;">Rate (₹)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 

                    $q_today = "SELECT dname,descrip,customer,amount FROM service_db.`servicetb` WHERE sdate='".$date."'";
                    $row_today = $conn->query($q_today);
                    while ($f_today = mysqli_fetch_assoc($row_today)){
                      $today_dname=$f_today["dname"];
                      $today_descrip=$f_today["descrip"];
                      $today_customer=$f_today["customer"];
                      $today_amount=$f_today["amount"];

                      echo "<tr><td></td><td style='text-transform: uppercase;'>".$today_dname."</td><td>".$today_descrip."</td><td>".$today_customer."</td><td style='font-weight: bold; text-align:right;'>".$today_amount."</td></tr>";
                      }
                          
                  ?> 
                    
                  </tbody>
                  </table>
                  
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Add Entry</strong>
                  </p>

                  <!-- form start -->
                  <form class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="dname" class="control-label">Device Name</label>
                        <input type="text" class="form-control" id="dname" placeholder="ASUS Zenfone Lacer 2" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="descrip" class="control-label">Description</label>
                        <input type="text" class="form-control" id="descrip" placeholder="Bla bla bla..." autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="customer" class="control-label">Customer Name</label>
                        <input type="text" class="form-control" id="customer" placeholder="ajmal hussain" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="amount" class="control-label">Rate</label>

                          <div class="input-group">
                            <span class="input-group-addon">₹</span>
                            <input id="amount" type="text" class="form-control" autocomplete="off">
                            <span class="input-group-addon">.00</span>
                          </div>
                      </div>
      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="reset" class="btn bg-blue">Reset</button>
                      </div>
                      <div class="btn-group pull-right" role="group" aria-label="Basic example">
                        <button id="" type="button" class="btn bg-navy clickable">Save</button>
                        
                      </div>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-blue"><strong> <span id="Total">0</span></strong></h5>
                    <span class="description-text">No of Service</span>
                    <text class="description-text text-primary">- Today</text>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-green"><strong>₹ <span id="inc">0</span></strong></h5>
                    <span class="description-text">Total</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3.2.1 -->
<script src="plugins/jQuery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script type="text/javascript" src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript" src="plugins/fastclick/fastclick.min.js"></script>

<script type="text/javascript" src="plugins/moment/moment.min.js"></script>

<script type="text/javascript" src="plugins/chartjs/chart.min.js"></script>

<script type="text/javascript" src="plugins/select2/select2.full.min.js"></script>

<script src="plugins/iCheck/icheck.js"></script>

<script type="text/javascript">
var type;
$(document).ready(function(){
        $("#add-entry").click(function(){
            var dname = $("#dname").val();
            var descrip = $("#descrip").val();
            var customer = $("#customer").val();
            var amount = $("#amount").val();

            var markup = "<tr><td><a id='delete-row' style='color: #000; cursor: pointer;'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td><td style='text-transform: uppercase;'>" + dname + "</td><td>" + descrip + "</td><td>" + customer + "</td><td style='font-weight: bold; float: right;'>" + amount +"</td></tr>";
            $("#service tbody").append(markup); 
        });
    });   

var total=0, inc=0, exp=0;
var j=1;

$('#service tbody').on("DOMSubtreeModified", function(){ tablepopulate();});
$(document).ready(function() { tablepopulate(); });

function tablepopulate(){
    var td = document.querySelectorAll('#service > tbody > tr > td:last-child');
    var tt = document.querySelectorAll('#service > tbody > tr > td:nth-child(4)');
    var total=0, inc=0;
    // var value = document.querySelector('table tr:last-child td:nth-child(3)').innerHTML;

    for (var i=0; i < td.length; i++)
    {
      var value = String(tt[i].innerText);
      var temp = parseInt(td[i].innerText);

          inc += parseInt(td[i].innerText);
          row_count = $('#service tbody tr').length;

      
    }

document.getElementById('inc').innerText = inc; 
document.getElementById('Total').innerText = row_count;

$('.form-group').find('input:text').val('');
}

$('#service').on('click', '#delete-row', function(){
    $(this).closest ('tr').remove ();
});

$(".clickable").click(function() {
                var dname = $("#dname").val();
                var descrip = $("#descrip").val();
                var customer = $("#customer").val();
                var amount = $("#amount").val();
                $.ajax({
                    type: "POST",
                    url: 'servicedb.php',
                    data: {var1: dname, var2: descrip, var3: customer, var4: amount },
                    cache: false,
                    success: function(data)
                    {
                      location.reload(true); // then reload the page.(3)
                    }
                });
            });

</script>

</body>
</html>
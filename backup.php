<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="stock";
$conn = mysqli_connect("localhost", $username, $password, $database);

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

$date = date("Y-m-d");
$ydate = date("Y-m-d", strtotime("-1 day", strtotime($date)));

$q_ytt = "SELECT tt from accounts.`ac` ORDER BY rdate DESC LIMIT 1";
$row_ytt = $conn->query($q_ytt);
$f_ytt = mysqli_fetch_assoc($row_ytt);
$ytt=$f_ytt["tt"];

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
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../plugins/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../dist/css/skins/skin-purple.min.css">
  <link rel="stylesheet" href="../rmpos.css">

<link href="../plugins/iCheck/square/square.css" rel="stylesheet">
  <link rel="stylesheet" href="plugins/animate/animate.css">

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
              <img src="../dist/img/myAvatar.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php if( isset($_SESSION['user']) ) { echo $name;} else{echo "User";} ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../dist/img/myAvatar.png" class="img-circle" alt="User Image">

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
                                  <a href=\"../admin/ua\" class=\"btn btn-default btn-flat\">Profile</a>
                                </div>
                                <div class=\"pull-right\">
                                  <a href=\"../admin/logout.php?logout\" class=\"btn btn-default btn-flat\">Sign out</a>
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
        <li><a href="../service.php"><i class="fa fa-wrench"></i> <span>Services</span></a></li>
        <li><a href="../db.php"><i class="fa fa-book"></i> <span>Stock Book</span></a></li>
        <li><a href="/ac"><i class="fa fa-inr"></i> <span>Accounts</span></a></li>
        <li class="active"><a href=""><i class="fa fa-hdd-o"></i> <span>Backup</span></a></li>

        <li class="header">DASHBOARD</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="../admin?stockinfo"><i class="fa fa-info"></i> <span>Stock Info</span></a></li>
        <li><a href="../admin?salesinfo"><i class="fa fa-area-chart"></i> <span>Sales Info</span></a></li>
        <li><a href="../admin?binfo"><i class="fa fa-briefcase"></i> <span>Business Info</span></a></li>

        <li class="header">ADMIN TOOLS</li>
        <li><a href="../admin?stockmd"><i class="fa fa-database"></i> <span>Stock Management</span></a></li>
        <li><a href="../admin?salehistory"><i class="fa fa-history"></i> <span>Sales History</span></a></li>

        
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
              <h3 class="box-title">Backup</h3>

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
                    <strong>Database Info</strong>
                  </p>
                  
                  <table id="ac" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Database</th>
                      <th>Size</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $q_tdate = "SELECT rdate from accounts.`ac` WHERE rdate='".$date."'";
                    $row_tdate = $conn->query($q_tdate);
                    $f_tdate = mysqli_fetch_assoc($row_tdate);
                    $tdate=$f_tdate["rdate"];

                    mysqli_select_db($conn, "accounts");  
                    $q = mysqli_query($conn, "SHOW TABLE STATUS");  
                    $size = 0;  
                    while($row = mysqli_fetch_assoc($q)) {  
                        $size += $row["Data_length"] + $row["Index_length"];  
                        $decimals = 2;  
                        $mbytes1 = number_format($size/(1024*1024),$decimals);
                    }

                    mysqli_select_db($conn, "billdb");  
                    $q = mysqli_query($conn, "SHOW TABLE STATUS");  
                    $size = 0;  
                    while($row = mysqli_fetch_assoc($q)) {  
                        $size += $row["Data_length"] + $row["Index_length"];  
                        $decimals = 2;  
                        $mbytes2 = number_format($size/(1024*1024),$decimals);
                    }

                    mysqli_select_db($conn, "service_db");  
                    $q = mysqli_query($conn, "SHOW TABLE STATUS");  
                    $size = 0;  
                    while($row = mysqli_fetch_assoc($q)) {  
                        $size += $row["Data_length"] + $row["Index_length"];  
                        $decimals = 2;  
                        $mbytes3 = number_format($size/(1024*1024),$decimals);
                    }

                    mysqli_select_db($conn, "stock");  
                    $q = mysqli_query($conn, "SHOW TABLE STATUS");  
                    $size = 0;  
                    while($row = mysqli_fetch_assoc($q)) {  
                        $size += $row["Data_length"] + $row["Index_length"];  
                        $decimals = 2;  
                        $mbytes4 = number_format($size/(1024*1024),$decimals);
                    }

                    mysqli_select_db($conn, "userdb");  
                    $q = mysqli_query($conn, "SHOW TABLE STATUS");  
                    $size = 0;  
                    while($row = mysqli_fetch_assoc($q)) {  
                        $size += $row["Data_length"] + $row["Index_length"];  
                        $decimals = 2;  
                        $mbytes5 = number_format($size/(1024*1024),$decimals);
                    }
              ?>
                  <tr><td>ACCOUNTS (accounts)</td><td><?php echo $mbytes1." Mb" ?></td></tr>
                  <tr><td>BILL BOOK (billdb)</td><td><?php echo $mbytes2." Mb" ?></td></tr>
                  <tr><td>SERVICE (service_db)</td><td><?php echo $mbytes3." Mb" ?></td></tr>
                  <tr><td>USER (userdb)</td><td><?php echo $mbytes5." Mb" ?></td></tr>  
                  <tr><td>STOCK BOOK (stock)</td><td><?php echo $mbytes4." Mb" ?></td></tr>
                  </tbody>
                  </table>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Operations</strong>
                  </p>
                  <table id="ac" class="table">
                    <tbody>
                    <tr><td>Bill Book</td><td><button type="submit" class="btn bg-maroon" onclick="initrunc('bill');">Truncate</button></td></tr>
                    <tr><td>Sales Book</td><td><button type="submit" class="btn bg-maroon" onclick="initrunc('sales');">Truncate</button></td></tr>
                    <tr><td>Service Book</td><td><button type="submit" class="btn bg-maroon" onclick="initrunc('service');">Truncate</button></td></tr>
                    <tr><td>Full Database Backup</td><td><button type="submit" id="bck" class="btn bg-olive">Backup</button></td></tr>
                    </tbody>

                  </table>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
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

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<script type="text/javascript" src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript" src="../plugins/fastclick/fastclick.min.js"></script>

<script type="text/javascript" src="../plugins/moment/moment.min.js"></script>

<script type="text/javascript" src="../plugins/chartjs/chart.min.js"></script>

<script type="text/javascript" src="../plugins/select2/select2.full.min.js"></script>

<script type="text/javascript" src="plugins/bootstrap-notify-3.1.3/dist/bootstrap-notify.min.js"></script>

<script type="text/javascript">
$("#bck").click(function() {
                var type = "bck";
                $.ajax({
                    type: "POST",
                    url: 'bck.php',
                    data: {optype: type},
                    cache: false,
                    success: function(data)
                    {
                      $.notify({
                          title: '<strong>Success!</strong>',
                          message: 'Full Database Dump completed. Go to D:/Backup folder',
                          animate: {
                              enter: 'animated',
                              exit: 'animated'
                            }
                        },{
                          type: 'success'
                        });
                    }
                });
            });
var tname = "";
function initrunc(val){
  if("bill" === val){ tname = val}
  else if("sales" === val){ tname = val}
  else if("service" === val){ tname = val} 
    truncate();
}

function truncate(){ 
                var type = "trunc";
                $.ajax({
                    type: "POST",
                    url: 'bck.php',
                    data: {optype: type, bname: tname},
                    cache: false,
                    success: function(data)
                    {
                      $.notify({
                          title: '<strong>Success!</strong>',
                          message: 'Truncated selected table',
                          animate: {
                              enter: 'animated',
                              exit: 'animated'
                            }
                        },{
                          type: 'success'
                        });
                    }
                });
            };

</script>

</body>
</html>
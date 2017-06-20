<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

 ob_start();
 session_start();

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: ../index.php");
  exit;
 }

date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="stock";
$conn = mysqli_connect("localhost", $username, $password, $database);

$uid = $_SESSION['user'];

$q_user = "SELECT name,role from userdb.users WHERE uname='".$uid."'";
          $row_user = $conn->query($q_user);
          $f_user = mysqli_fetch_assoc($row_user);
          $name=$f_user["name"];
          $role=$f_user["role"];

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
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../plugins/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../../dist/css/skins/skin-yellow.min.css">
  <link rel="stylesheet" href="../../rmpos.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-yellow sidebar-mini fixed">
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
              <img src="../../dist/img/myAvatar.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../dist/img/myAvatar.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $name; ?>
                  <small><?php echo $role; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../ua" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php?logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
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
        <li><a href="../../service.php"><i class="fa fa-wrench"></i> <span>Services</span></a></li>
        <li><a href="../../db.php"><i class="fa fa-book"></i> <span>Stock Book</span></a></li>
        <li><a href="../../ac"><i class="fa fa-inr"></i> <span>Accounts</span></a></li>
        <li><a href="../../backup.php"><i class="fa fa-hdd-o"></i> <span>Backup</span></a></li>

        <li class="header">DASHBOARD</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="../board"><i class="fa fa-info"></i> <span>Stock Info</span></a></li>
        <li><a href="../saleb"><i class="fa fa-area-chart"></i> <span>Sales Info</span></a></li>
        <li class="active"><a href=""><i class="fa fa-briefcase"></i> <span>Business Info</span></a></li>

        <li class="header">ADMIN TOOLS</li>
        <li><a href="../stockmd"><i class="fa fa-database"></i> <span>Stock Management</span></a></li>
        <li><a href="../salehistory"><i class="fa fa-history"></i> <span>Sales History</span></a></li>
        
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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sales Report: <strong><?php echo date('M'); ?></strong></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    
                  </p>
                  <div id="canvas-holder" style="width:100%;">
                      <canvas id="line-chart" />
                  </div>
                  
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

<!-- jQuery 3.2.1 -->
<script src="../../plugins/jQuery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>

<script type="text/javascript" src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript" src="../../plugins/fastclick/fastclick.min.js"></script>

<script type="text/javascript" src="../../plugins/moment/moment.min.js"></script>

<script type="text/javascript" src="../../plugins/chartjs/chart.min.js"></script>

<script type="text/javascript">
var options = {
  type: 'line',
  data: {
    labels: [<?php
  $M = date("M"); $d = date("d"); 
  $date = "01-".$M;
  $end_date = "31-".$M;

  while (strtotime($date) <= strtotime($end_date)) {

                echo "\"$date\",";
                $date = date ("d-M", strtotime("+1 day", strtotime($date)));
  }

?>],
    datasets: [
      {
        label: 'Income',
        data: [<?php 
          $m = date("m"); $d = date("d"); $y = date("y"); 
          $date1 = $y."-".$m."-01";
           $end_date1 = $y."-".$m."-31";

          while (strtotime($date1) <= strtotime($end_date1)) {
                      
          $q_tinc = "SELECT tinc from accounts.ac WHERE rdate='".$date1."'";
          $row_tinc = $conn->query($q_tinc);
          $f_tinc = mysqli_fetch_assoc($row_tinc);
          $tinc=$f_tinc["tinc"];

          if($tinc === NULL)
            echo "0,";
          else{
            echo $tinc.",";  
          }

          $date1 = date ("y-m-d", strtotime("+1 day", strtotime($date1)));
          }

          ?>],
        borderWidth: 3,
        fill: false,
        backgroundColor: "rgba(203, 220, 56, 0.60)",
        borderColor: "#AFB42B"

      },{
        label: 'Expenses',
        data: [<?php 
          $m = date("m"); $d = date("d"); $y = date("y"); 
          $date2 = $y."-".$m."-01";
           $end_date2 = $y."-".$m."-31";

          while (strtotime($date2) <= strtotime($end_date2)) {
                      
          $q_texp = "SELECT texp from accounts.ac WHERE rdate='".$date2."'";
          $row_texp = $conn->query($q_texp);
          $f_texp = mysqli_fetch_assoc($row_texp);
          $texp=$f_texp["texp"];

          if($texp === NULL)
            echo "0,";
          else{
            echo $texp.",";  
          }

          $date2 = date ("y-m-d", strtotime("+1 day", strtotime($date2)));
          }

          ?>],
        borderWidth: 3,
        fill: false,
        backgroundColor: "rgba(173, 20, 20, 0.54)",
        borderColor: "#ad1414"
      }
    ]
  },
  options: {
                responsive: true,
                
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Days'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Amount (₹)'
                        },
                        // ticks: {
                            
                        //     beginAtZero: true,
                        //     steps: 5,
                        //     stepValue: 5,   
                        //     max: 20
                        // }
                    }]
                },
                maintainAspectRatio: true

            }
}

var ctx = document.getElementById('line-chart').getContext('2d');
// ctx.canvas.height = 50;
new Chart(ctx, options);
</script>

</body>
</html>
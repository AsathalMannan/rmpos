<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="stock";
$conn = mysqli_connect("localhost", $username, $password, $database);

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../../dist/css/skins/skin-purple.min.css">
  <link rel="stylesheet" href="../../rmpos.css">

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
              <img src="../../dist/img/myAvatar.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../dist/img/myAvatar.png" class="img-circle" alt="User Image">

                <p>
                  Admin
                  <small>Full Access</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
        <li><a href="../../db.php"><i class="fa fa-book"></i> <span>Stock Book</span></a></li>

        <li class="header">ADMIN TOOLS</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href=""><i class="fa fa-info"></i> <span>Stock Info</span></a></li>
        <li><a href="../stockmd"><i class="fa fa-database"></i> <span>Stock Management</span></a></li>
        <li><a href="../salehistory.php"><i class="fa fa-history"></i> <span>Sales History</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--     <section class="content-header">
      <h1>
        Cart
        <small>Add items</small>
      </h1>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Stock Dashboard</h3>

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
                    <strong>Stock On: <?php echo date('d-M-Y'); ?></strong>
                  </p>

                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">Scratch Gaurd</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">Back Case</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">Flip Case</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Memory Card</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Pendrive</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Power Bank</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Charger</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Mobile Phones</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Card Reader</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Headphones</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Battery</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Data Cables</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Mobile Panels</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Speakers</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Tampered Glass</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">Total</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.col -->
               
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                
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

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>

<script type="text/javascript" src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript" src="../../plugins/fastclick/fastclick.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
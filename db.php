<?php
ob_start();
session_start();

 if( isset($_SESSION['user']) ) {

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

          }


$username="root";
$password="pass123";
$database="stock";
$conn = mysqli_connect("localhost", $username, $password, $database);

$query = "SELECT pno,pname,category,price FROM stocktb";
$row_stockdb = $conn->query($query);

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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

  <!-- Datatables -->
  <!-- <link rel="stylesheet" type="text/css" href="../DataTables/Bootstrap-3.3.7/css/bootstrap.min.css"/> -->
  <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.10.15/css/dataTables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/AutoFill-2.2.0/css/autoFill.bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/Buttons-1.3.1/css/buttons.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/ColReorder-1.3.3/css/colReorder.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/FixedColumns-3.2.2/css/fixedColumns.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/FixedHeader-3.1.2/css/fixedHeader.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/KeyTable-2.2.1/css/keyTable.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/Responsive-2.1.1/css/responsive.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/RowGroup-1.0.0/css/rowGroup.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/RowReorder-1.2.0/css/rowReorder.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/Scroller-1.4.2/css/scroller.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/Select-1.2.2/css/select.bootstrap.min.css"/>
  <!-- /Datatables-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
  .flyover {
  margin-top:-1000px;
   overflow: hidden;
   position: fixed;
   width: 50%;
   opacity: 0.9;
   z-index: 1050;
   transition: all 1s ease;
}
 
.flyover.in {
  margin-top: 150px;

}
</style>
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
        <li><a href="../"><i class="fa fa-cart-plus"></i> <span>Cart</span></a></li>
        <li><a href="service.php"><i class="fa fa-wrench"></i> <span>Services</span></a></li>
        <li class="active"><a href="#"><i class="fa fa-book"></i> <span>Stock Book</span></a></li>
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
          <div class="box card-cart">
            <div class="box-header">
              <h3 class="box-title">Stock Book</h3>
            </div>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="db-tb" class="table table-bordered table-hover" data-page-length='25'>
                <thead>
                <tr>
                  <th>Product No.</th>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th>Price (₹)</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
        </div>
      

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

<!-- Datatable -->

<script type="text/javascript" src="DataTables/JSZip-3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="DataTables/pdfmake-0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript" src="DataTables/pdfmake-0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript" src="DataTables/DataTables-1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="DataTables/DataTables-1.10.15/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="DataTables/AutoFill-2.2.0/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="DataTables/AutoFill-2.2.0/js/autoFill.bootstrap.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.3.1/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.3.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.3.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="DataTables/ColReorder-1.3.3/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="DataTables/FixedColumns-3.2.2/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="DataTables/FixedHeader-3.1.2/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="DataTables/KeyTable-2.2.1/js/dataTables.keyTable.min.js"></script>
<script type="text/javascript" src="DataTables/Responsive-2.1.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="DataTables/Responsive-2.1.1/js/responsive.bootstrap.min.js"></script>
<script type="text/javascript" src="DataTables/RowGroup-1.0.0/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="DataTables/RowReorder-1.2.0/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" src="DataTables/Scroller-1.4.2/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="DataTables/Select-1.2.2/js/dataTables.select.min.js"></script>
<!--/Datatable-->

<!--Datatable init-->
<script type="text/javascript">
$(document).ready( function () {
    $('#db-tb').DataTable({
      paging: true,
      scrollY: 280,
      responsive: true,
      dom: 'Bfrtip',
      "processing": true,
      "deferRender": true,
      "serverSide": true,
      "ajax": {
            url: 'stockaccess.php',
            type: 'POST'
        },
      "columns": [
                {"data": "pno"},
                {"data": "category"},
                {"data": "pname"},
                {"data": "price"}
            ],
      keys: {
        columns: [ 1, 2, 3, 4 ],
      },
      buttons: [
        'colvis'
      ]
      
    });
} );
</script>

</body>
</html>

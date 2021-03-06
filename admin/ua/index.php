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

 if( !isset($_SESSION['user']) ) {
  header("Location: ../index.php");
  exit;
 }


$uid = $_SESSION['user'];

$q_user = "SELECT name,role from userdb.users WHERE uname='".$uid."'";
          $row_user = $conn->query($q_user);
          $f_user = mysqli_fetch_assoc($row_user);
          $name=$f_user["name"];
          $role=$f_user["role"];



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

<body class="hold-transition skin-yellow sidebar-mini">
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
              <span class="hidden-xs"><?php  echo $name; ?></span>
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
                  <a href="" class="btn btn-default btn-flat">Profile</a>
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
        <li><a href="../../"><i class="fa fa-cart-plus"></i> <span>Cart</span></a></li>
        <li><a href="../../service.php"><i class="fa fa-wrench"></i> <span>Services</span></a></li>
        <li><a href="../../db.php"><i class="fa fa-book"></i> <span>Stock Book</span></a></li>
        <li><a href="../../ac"><i class="fa fa-inr"></i> <span>Accounts</span></a></li>
        <li><a href="../../backup.php"><i class="fa fa-hdd-o"></i> <span>Backup</span></a></li>

        <li class="header">DASHBOARD</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="../board"><i class="fa fa-info"></i> <span>Stock Info</span></a></li>
        <li><a href="../saleb"><i class="fa fa-area-chart"></i> <span>Sales Info</span></a></li>
        <li><a href="../binfo"><i class="fa fa-briefcase"></i> <span>Business Info</span></a></li>

        <li class="header">ADMIN TOOLS</li>
        <li><a href="../stockmd"><i class="fa fa-database"></i> <span>Stock Management</span></a></li>
        <li><a href="../salehistory"><i class="fa fa-history"></i> <span>Sales History</span></a></li>
        <li class="active"><a href=""><i class="fa fa-user-md"></i> <span>User Accounts</span></a></li>
        
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
              <h3 class="box-title">User Accounts Settings</h3>

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
                    <strong>User Accounts</strong>
                  </p>
                  
                  <table id="ua" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Role</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $q_userdb = "SELECT uname,name,role from userdb.`users`";
                    $row_userdb = $conn->query($q_userdb);
                    while($f_userdb = mysqli_fetch_assoc($row_userdb)){
                    $uname=$f_userdb["uname"];
                    $name=$f_userdb["name"];
                    $role=$f_userdb["role"];

                    echo "<tr><td id='un'>".$uname."</td><td id='n'>".$name."</td><td id='r' style='font-weight: bold;'>".$role."</td></tr>";
                  }
              ?>
                    
                  </tbody>
                  </table>
                  
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Edit</strong>
                  </p>

                  <!-- form start -->
                  <form class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="entryname" class="control-label">UserID</label>
                          <input type="text" class="form-control" id="uname" placeholder="User Name" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="entryname" class="control-label">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Name" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label for="typeoption1" class="pull-left control-label">Role</label>

                        <div class="col-sm-5">
                          <div class="radio">
                            <label>
                              <input type="radio" name="Role" id="typeoption1" value="Owner">
                              Owner
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Role" id="typeoption2" value="Admin">
                              Admin
                            </label>
                          </div>
                          </div>
                          <div class="col-sm-5">
                          <div class="radio">
                            <label>
                              <input type="radio" name="Role" id="typeoption3" value="Staff">
                              Staff
                            </label>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="entryname" class="control-label">Password</label>
                          <input type="password" class="form-control" id="pass" autocomplete="off">
                      </div>
      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="type" type="button" class="btn btn-success clickable-add" value="add">Add</button>
                        <button id="type1" type="button" class="btn bg-navy clickable-update" value="update">Update</button>
                      </div>
                      <div class="btn-group pull-right" role="group" aria-label="Basic example">
                        <button id="type2" type="button" class="btn bg-red clickable-delete" value="delete">Delete</button>
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

<script type="text/javascript" src="../../plugins/select2/select2.full.min.js"></script>

<script src="../../plugins/iCheck/icheck.js"></script>

<script type="text/javascript">


$("#ua tbody tr").click(function () {
    //this = the row a user has clicked
    var un = $(this).find("#un").text();
    var n = $(this).find("#n").text();
    var r = $(this).find("#r").text(); 
    $("#uname").val(un); 
    $("#name").val(n); 
    if(r === "Owner"){document.getElementById('typeoption1').checked = true; }
    else if(r === "Admin"){$("#typeoption2").prop("checked", true);}
    else if(r === "Staff"){$("#typeoption3").prop("checked", true);}
    // $("#role").val(un); 
});

$(".clickable-add").click(function() {
            var uname = $("#uname").val();
            var name = $("#name").val();
            if (document.getElementById('typeoption1').checked) {
              role = document.getElementById('typeoption1').value;
            }
            else if (document.getElementById('typeoption2').checked) {
              role = document.getElementById('typeoption2').value;
            }
            else if (document.getElementById('typeoption3').checked) {
              role = document.getElementById('typeoption3').value;
            }
            var pass = $("#pass").val();
            var type = $("#type").val();
                $.ajax({
                    type: "POST",
                    url: 'uadb.php',
                    data: {username: uname, fname: name, prole: role, password: pass, updatetype: type },
                    cache: false,
                    success: function(data)
                    {
                      location.reload(true);
                    }
                });
            });

$(".clickable-update").click(function() {
            var uname = $("#uname").val();
            var name = $("#name").val();
            if (document.getElementById('typeoption1').checked) {
              role = document.getElementById('typeoption1').value;
            }
            else if (document.getElementById('typeoption2').checked) {
              role = document.getElementById('typeoption2').value;
            }
            else if (document.getElementById('typeoption3').checked) {
              role = document.getElementById('typeoption3').value;
            }
            var pass = $("#pass").val();
            var type = $("#type1").val();
                $.ajax({
                    type: "POST",
                    url: 'uadb.php',
                    data: {username: uname, fname: name, prole: role, password: pass, updatetype: type },
                    cache: false,
                    success: function(data)
                    {
                      location.reload(true);
                    }
                });
            });

$(".clickable-delete").click(function() {
            var uname = $("#uname").val();
            var name = $("#name").val();
            if (document.getElementById('typeoption1').checked) {
              role = document.getElementById('typeoption1').value;
            }
            else if (document.getElementById('typeoption2').checked) {
              role = document.getElementById('typeoption2').value;
            }
            else if (document.getElementById('typeoption3').checked) {
              role = document.getElementById('typeoption3').value;
            }
            var pass = $("#pass").val();
            var type = $("#type2").val();
                $.ajax({
                    type: "POST",
                    url: 'uadb.php',
                    data: {username: uname, fname: name, prole: role, password: pass, updatetype: type },
                    cache: false,
                    success: function(data)
                    {
                      location.reload(true);
                    }
                });
            });

</script>

</body>
</html>
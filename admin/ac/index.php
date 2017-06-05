<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// include 'sale.php';

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

        <li class="header">DASHBOARD</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="../board"><i class="fa fa-info"></i> <span>Stock Info</span></a></li>
        <li><a href="../saleb"><i class="fa fa-area-chart"></i> <span>Sales Info</span></a></li>

        <li class="header">ADMIN TOOLS</li>
        <li><a href="../stockmd"><i class="fa fa-database"></i> <span>Stock Management</span></a></li>
        <li><a href="../salehistory.php"><i class="fa fa-history"></i> <span>Sales History</span></a></li>
        <li class="active"><a href=""><i class="fa fa-inr"></i> <span>Accounts</span></a></li>
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
              <h3 class="box-title">Accounts</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8 border-right">
                  <p class="text-center">
                    <strong>Today Report: <?php echo date("d-M-y") ?></strong>
                  </p>
                  
                  <table id="ac" class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th style="float: right;">Amount (₹)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="bg-info">
                      <td></td><td>CASH IN LEDGER</td><td>In Ledger</td><td style="font-weight: bold; float: right;">100000</td>
                    </tr>
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
                        <label for="entryname" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="entryname" placeholder="Entry Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="typeoption1" class="col-sm-2 control-label">Type</label>

                        <div class="col-sm-10">
                          <div class="radio">
                            <label>
                              <input type="radio" name="Type" id="typeoption1" value="Income">
                              Income
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Type" id="typeoption2" value="Expenditure">
                              Expenditure
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="amount" class="col-sm-2 control-label">Amount</label>

                        <div class="col-sm-12">
                          <div class="input-group">
                            <span class="input-group-addon">₹</span>
                            <input id="amount" type="text" class="form-control">
                            <span class="input-group-addon">.00</span>
                          </div>
                        </div>
                      </div>
      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="reset" class="btn btn-warning">Reset</button>
                      <button id="add-entry" type="button" class="btn btn-success pull-right">Add</button>
                      <button id="" type="button" class="btn btn-primary clickable" onclick="senditems();"">Save</button>
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
                    <h5 class="description-header">₹ <span>0</span></h5>
                    <span class="description-text">Cash in ledger</span>
                    <text class="description-text">- Yesterday</text>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-blue"><strong>₹ <span id="Total">0</span></strong></h5>
                    <span class="description-text">Cash in ledger</span>
                    <text class="description-text text-primary">- Today</text>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-green"><strong>₹ <span id="inc">0</span></strong></h5>
                    <span class="description-text">Total Income</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <h5 class="description-header text-red"><strong>₹ <span id="exp">0</span></strong></h5>
                    <span class="description-text">Expenditure</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Sales Report: <?php echo date('M'); ?></strong>
                  </p>
                  

                  
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
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>

<script type="text/javascript" src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript" src="../../plugins/fastclick/fastclick.min.js"></script>

<script type="text/javascript" src="../../plugins/moment/moment.min.js"></script>

<script type="text/javascript" src="../../plugins/chartjs/chart.min.js"></script>

<script type="text/javascript">
var type;
$(document).ready(function(){
        $("#add-entry").click(function(){
            var name = $("#entryname").val();
            if (document.getElementById('typeoption1').checked) {
              type = document.getElementById('typeoption1').value;
            }
            else if (document.getElementById('typeoption2').checked) {
              type = document.getElementById('typeoption2').value;
            }
            var amount = $("#amount").val();

            var markup = "<tr><td><a id='delete-row' style='color: #000; cursor: pointer;'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td><td style='text-transform: uppercase;'>" + name + "</td><td>" + type + "</td><td style='font-weight: bold; float: right;'>" + amount +"</td></tr>";
            $("#ac tbody").append(markup); 
        });
    });   

var total=0, inc=0, exp=0;
var j=1;
$('#ac tbody').on("DOMSubtreeModified", function(){
    var td = document.querySelectorAll('#ac > tbody > tr > td:last-child');
    var tt = document.querySelectorAll('#ac > tbody > tr > td:nth-child(3)');
    var typevalue = String(type);
    var total=0, inc=0, exp=0;
    // var value = document.querySelector('table tr:last-child td:nth-child(3)').innerHTML;

    for (var i=0; i < td.length; i++)
    {
      var value = String(tt[i].innerText);
      var temp = parseInt(td[i].innerText);

      if(value == "Income") {
          inc += parseInt(td[i].innerText);
          total += parseInt(td[i].innerText);
      } else if(value == "Expenditure") {
          exp += parseInt(td[i].innerText);
          total = total - parseInt(td[i].innerText);
      } else if(value == "In Ledger"){
          total += parseInt(td[i].innerText);
      }
    }

document.getElementById('Total').innerText = total;   
document.getElementById('exp').innerText = exp; 
document.getElementById('inc').innerText = inc; 

$('.form-group').find('input:text').val('');
    
});

$('#ac').on('click', '#delete-row', function(){
    $(this).closest ('tr').remove ();
});


var arr0 = new Array();
var arr1 = new Array();
var arr2 = new Array();
function senditems(){

var table = document.getElementById('ac');
var i=0;

        for (var r = 1, n = table.rows.length; r < n; r++) {
            // for (var c = 1, m = 1; c = m; c++) {
            arr0[i] = table.rows[r].cells[1].innerHTML;
            arr1[i] = table.rows[r].cells[2].innerHTML;
            arr2[i] = table.rows[r].cells[3].innerHTML;
            i++;
            // }
        }
      }

$(".clickable").click(function() {
                //alert($(this).attr('id'));
                total = document.getElementById('Total').innerText;
                exp = document.getElementById('exp').innerText;
                inc = document.getElementById('inc').innerText;
                var arrn = JSON.stringify(arr0);
                var arrt = JSON.stringify(arr1);
                var arra = JSON.stringify(arr2);
                $.ajax({
                    type: "POST",
                    url: 'jsonwriter.php',
                    data: {arrayer0: arrn, arrayer1: arrt, arrayer2: arra, ledger: total, tinc: inc, texp: exp },
                    cache: false,
                    success: function(data)
                    {
                      // alert("success")
                      setTimeout(function(){
                      location.reload(true); // then reload the page.(3)
                      }, 5000);
                    }
                });
            });
</script>

</body>
</html>
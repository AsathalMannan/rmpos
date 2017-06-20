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
        <li class="active"><a href=""><i class="fa fa-inr"></i> <span>Accounts</span></a></li>
        <li><a href="../backup.php"><i class="fa fa-hdd-o"></i> <span>Backup</span></a></li>

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
              <h3 class="box-title">Accounts Book</h3>

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
                    <strong>Today Report: <?php echo date("d-M-y") ?></strong>
                  </p>
                  
                  <table id="ac" class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th style="text-align:right;">Amount (₹)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $q_tdate = "SELECT rdate from accounts.`ac` WHERE rdate='".$date."'";
                    $row_tdate = $conn->query($q_tdate);
                    $f_tdate = mysqli_fetch_assoc($row_tdate);
                    $tdate=$f_tdate["rdate"];

                    $q_ydate = "SELECT rdate from accounts.`ac` ORDER BY rdate DESC LIMIT 1";
                    $row_ydate = $conn->query($q_ydate);
                    $f_ydate = mysqli_fetch_assoc($row_ydate);
                    $yedate=$f_ydate["rdate"];

                    if ($tdate == $date){

                      $query_type = "\"Update\";";
                        $q_tt = "SELECT tinc,texp,tt from accounts.`ac` WHERE rdate='".$date."'";
                        $row_tt = $conn->query($q_tt);
                        $f_tt = mysqli_fetch_assoc($row_tt);
                        $tt=$f_tt["tt"];
                        $tinc=$f_tt["tinc"];
                        $texp=$f_tt["texp"];

                        $q_today = "SELECT name,type,amount FROM accounts.`collection` WHERE rdate='".$date."'";
                        $row_today = $conn->query($q_today);
                        while ($f_today = mysqli_fetch_assoc($row_today)){
                          $today_name=$f_today["name"];
                          $today_type=$f_today["type"];
                          $today_amount=$f_today["amount"];

                          if($today_name == "CASH IN LEDGER" || $today_name == "SALES" || $today_name == "SERVICES"){
                          echo "<tr><td></td><td style='text-transform: uppercase;'>".$today_name."</td><td>".$today_type."</td><td style='font-weight: bold; text-align:right;'>".$today_amount."</td></tr>";
                          }
                          else{
                          echo "<tr><td><a id='delete-row' style='color: #000; cursor: pointer;'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td><td style='text-transform: uppercase;'>".$today_name."</td><td>".$today_type."</td><td style='font-weight: bold; text-align:right;'>".$today_amount."</td></tr>";
                          }
                        }
                      }

                      else if($yedate < $date){
                        $query_type = "\"Add\";";
                        // SELECT tt from accounts.`ac` ORDER BY rdate DESC LIMIT 1
                        $q_yett = "SELECT tt from accounts.`ac` ORDER BY rdate DESC LIMIT 1";
                        $row_yett = $conn->query($q_yett);
                        $f_yett = mysqli_fetch_assoc($row_yett);
                        $yett=$f_yett["tt"];

                        $q_tssum = "SELECT SUM(gtotal) AS tssum from billdb.`billtb` WHERE bdate='".$date."'";
                        $row_tssum = $conn->query($q_tssum);
                        $f_tssum = mysqli_fetch_assoc($row_tssum);
                        $tssum=$f_tssum["tssum"];

                        $q_tserv = "SELECT SUM(amount) AS tserv from service_db.`servicetb` WHERE sdate='".$date."'";
                        $row_tserv = $conn->query($q_tserv);
                        $f_tserv = mysqli_fetch_assoc($row_tserv);
                        $tserv=$f_tserv["tserv"];

                        echo "<tr><td></td><td style='text-transform: uppercase;'>CASH IN LEDGER</td><td>In Ledger</td><td style='font-weight: bold; text-align:right;'>".$yett."</td></tr>";
                        if($tssum === NULL){$tssum = 0;}
                        echo "<tr><td></td><td style='text-transform: uppercase;'>SALES</td><td>Income</td><td style='font-weight: bold; text-align:right;'>".$tssum."</td></tr>";
                        if($tserv === NULL){$tserv = 0;}
                        echo "<tr><td></td><td style='text-transform: uppercase;'>SERVICES</td><td>Income</td><td style='font-weight: bold; text-align:right;'>".$tserv."</td></tr>";
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
                        <label for="entryname" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="entryname" placeholder="Entry Name" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="typeoption1" class="col-sm-2 control-label">Type</label>

                        <div class="col-sm-5">
                          <div class="radio">
                            <label>
                              <input type="radio" name="Type" id="typeoption1" value="Income">
                              Income
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Type" id="typeoption2" value="Expenses">
                              Expenses
                            </label>
                          </div>
                          </div>
                          <div class="col-sm-5">
                          <div class="radio">
                            <label>
                              <input type="radio" name="Type" id="typeoption3" value="Out Cash">
                              Out Cash
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Type" id="typeoption4" value="Purchase" disabled>
                              Purchase
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="amount" class="col-sm-2 control-label">Amount</label>

                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon">₹</span>
                            <input id="amount" type="text" class="form-control" autocomplete="off">
                            <span class="input-group-addon">.00</span>
                          </div>
                        </div>
                      </div>
      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="add-entry" type="button" class="btn btn-success">Add</button>
                        <button type="reset" class="btn bg-blue">Reset</button>
                      </div>
                      <div class="btn-group pull-right" role="group" aria-label="Basic example">
                        <button id="" type="button" class="btn bg-navy clickable" onclick="senditems();">
                        <?php if($tdate == $date){echo "Update";} else {echo "Save";} ?></button>
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
                    <h5 class="description-header">₹ <span>
                    <?php if($ytt === NULL){ echo"0"; } else{ echo $ytt; } ?></span></h5>
                    <span class="description-text">Cash in ledger</span>
                    <text class="description-text">- Previous</text>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-blue"><strong>₹ <span id="Total">
                    <?php if($tdate == $date){ echo $tt; } else{ echo "0"; } ?></span></strong></h5>
                    <span class="description-text">Cash in ledger</span>
                    <text class="description-text text-primary">- Today</text>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-green"><strong>₹ <span id="inc">
                    <?php if($tdate == $date){ echo $tinc; } else{ echo "0"; } ?></span></strong></h5>
                    <span class="description-text">Total Income</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <h5 class="description-header text-red"><strong>₹ <span id="exp">
                    <?php if($tdate == $date){ echo $texp; } else{ echo "0"; } ?></span></strong></h5>
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
      

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3.2.1 -->
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

<script src="../plugins/iCheck/icheck.js"></script>

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
            else if (document.getElementById('typeoption3').checked) {
              type = document.getElementById('typeoption3').value;
            }
            else if (document.getElementById('typeoption4').checked) {
              type = document.getElementById('typeoption4').value;
            }
            var amount = $("#amount").val();

            var markup = "<tr><td><a id='delete-row' style='color: #000; cursor: pointer;'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td><td style='text-transform: uppercase;'>" + name + "</td><td>" + type + "</td><td style='font-weight: bold; float: right;'>" + amount +"</td></tr>";
            $("#ac tbody").append(markup); 
        });
    });   

var total=0, inc=0, exp=0;
var j=1;

$('#ac tbody').on("DOMSubtreeModified", function(){ tablepopulate();});
$(document).ready(function() { tablepopulate(); });

function tablepopulate(){
    var td = document.querySelectorAll('#ac > tbody > tr > td:last-child');
    var tt = document.querySelectorAll('#ac > tbody > tr > td:nth-child(3)');
    var typevalue = String(type);
    var total=0, inc=0, exp=0;

    for (var i=0; i < td.length; i++)
    {
      var value = String(tt[i].innerText);
      var temp = parseInt(td[i].innerText);

      if(value == "Income") {
          inc += parseInt(td[i].innerText);
          total += parseInt(td[i].innerText);
      } else if(value == "Expenses") {
          exp += parseInt(td[i].innerText);
          total = total - parseInt(td[i].innerText);
      } else if(value == "In Ledger"){
          total += parseInt(td[i].innerText);
      } else if(value == "Out Cash"){
          total -= parseInt(td[i].innerText);
      }
    }

document.getElementById('Total').innerText = total;   
document.getElementById('exp').innerText = exp; 
document.getElementById('inc').innerText = inc; 

$('.form-group').find('input:text').val('');
}

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
                q_type = <?php echo $query_type; ?>
                var arrn = JSON.stringify(arr0);
                var arrt = JSON.stringify(arr1);
                var arra = JSON.stringify(arr2);
                $.ajax({
                    type: "POST",
                    url: 'updatedb.php',
                    data: {arrayer0: arrn, arrayer1: arrt, arrayer2: arra, ledger: total, tinc: inc, texp: exp, qtype: q_type },
                    cache: false,
                    success: function(data)
                    {
                      location.reload(true);
                    }
                });
            });

<?php if($tdate == $date){ ?>
$(document).ready(function() {
            <?php
               $q_tssum = "SELECT SUM(gtotal) AS tssum from billdb.`billtb` WHERE bdate='".$date."'";
                        $row_tssum = $conn->query($q_tssum);
                        $f_tssum = mysqli_fetch_assoc($row_tssum);
                        $tssum=$f_tssum["tssum"];
                        if($tssum === NULL){$tssum = 0;}

              $q_tserv = "SELECT SUM(amount) AS tserv from service_db.`servicetb` WHERE sdate='".$date."'";
                        $row_tserv = $conn->query($q_tserv);
                        $f_tserv = mysqli_fetch_assoc($row_tserv);
                        $tserv=$f_tserv["tserv"];
                        if($tserv === NULL){$tserv = 0;} ?>

              var tssum = <?php echo $tssum ?>;
              var tserv = <?php echo $tserv ?>;
              var ac = document.getElementById('ac');
              ac.rows[2].cells[3].innerHTML = tssum;
              ac.rows[3].cells[3].innerHTML = tserv;
            });
<?php
}
?>

$(document).ready( function () {
  var ac = document.getElementById('ac');
  var td = document.querySelectorAll('#ac > tbody > tr > td:first-child');
  var tt1 = document.querySelectorAll('#ac > tbody > tr > td:nth-child(1)');
  var tt2 = document.querySelectorAll('#ac > tbody > tr > td:nth-child(2)');

  $(ac.rows[1].cells[1]).find('')

  });

$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square',
    radioClass: 'iradio_square',
    increaseArea: '20%' // optional
  });
});
</script>

</body>
</html>
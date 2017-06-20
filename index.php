<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

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

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POS System : Rahman Mobiles</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  <link rel="icon" sizes="16x16 32x32 48x48" type="image/x-icon" href="/favicon.ico">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons-2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">
  <link rel="stylesheet" href="rmpos.css">
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
                                  <a href=\"admin/ua\" class=\"btn btn-default btn-flat\">Settings</a>
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
        <li class="active"><a href=""><i class="fa fa-cart-plus"></i> <span>Cart</span></a></li>
        <li><a href="service.php"><i class="fa fa-wrench"></i> <span>Services</span></a></li>
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
        
        <div class="col-md-8">
          <div class="box card-cart">
            <div class="box-header">
              <h3 class="box-title">Cart List</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body" id="carttable">
              <table id="cart-tb" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Product No.</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Price</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span id="ttotal" class="description-percentage text-blue" style="font-size: 3em;">0</span><br>
                    <span class="description-text">No. of Items</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <div class="col-sm-3 col-xs-6 pull-right">
                  <div class="description-block">
                    <span id="tprice" class="description-percentage text-green" style="font-size: 3em;">₹ 0</span><br>
                    <span class="description-text">Total Price</span>
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


        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Items</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                   <label class="control-label" for="pro" >Product No</label>
                   <select class="productName form-control select2-selection--single" id="pro" name="productName" style="width: 100%;"></select>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Review</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover">
                <tr >
                  <td>TOTAL COST:</td><td>₹ <span id="tcost">0</span></td>
                </tr>
                <tr>
                  <td>Discount:</td><td><input type="text" class="form-control" id="disc" placeholder="0" onkeyup="review();" autocomplete="off"></td>
                </tr>
                <tr>
                  <td>Amount Given:</td><td><input type="text" class="form-control" id="amnt" onkeyup="review();" placeholder="3000"></td>
                </tr>
                <tr>
                  <td>Return:</td><td>₹ <span id="return">0</span></td>
                </tr>
              </table>
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success clickable" onclick="senditems();">Pay</button>
                <button type="submit" class="btn btn-danger pull-right">Cancel Bill</button>
              </div>
            
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

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script type="text/javascript" src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript" src="plugins/fastclick/fastclick.min.js"></script>

<script type="text/javascript" src="plugins/bootstrap-notify-3.1.3/dist/bootstrap-notify.min.js"></script>

<script type="text/javascript" src="plugins/select2/select2.full.min.js"></script>


<script type="text/javascript">
  $(function(){
    $('#carttable').height();
    $('#carttable').slimScroll({
        height: '352px'
    });
});
</script>

<script type="text/javascript">
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
              if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });   

    $('#cart-tb').on('click', '#delete-row', function(){
      $(this).closest ('tr').remove ();
    });

</script>

<script type="text/javascript">
var total = 0;
var row_count;
$('#cart-tb tbody').on("DOMSubtreeModified", function(){ 
    var td = document.querySelectorAll('#cart-tb > tbody > tr > td:last-child');
    total = 0;
    for (var i = 0; i < td.length; i++)
    {
        total += parseInt(td[i].innerText);
    }

    row_count = $('#cart-tb tbody tr').length;
    document.getElementById('tprice').innerText = ("₹ " + total);
    document.getElementById('ttotal').innerText = row_count;
    document.getElementById('tcost').innerText = total;

    $('.form-group').find('input:text').val('');

});
</script>

<form id="sampleForm" name="sampleForm" method="post" action="payment.php">
<input type="hidden" name="arrayer" id="arrayer" value="">
<input type="hidden" name="amount" id="amount" value="">
<input type="hidden" name="discount" id="discount" value="">
<input type="hidden" name="adiscount" id="adiscount" value="">
<input type="hidden" name="return" id="return" value="">
</form>

<script type="text/javascript">
$(document).keydown(function(e) {
    if(e.which == 9) {
      $('#disc').focus();
    }
});

var retur;
var disc;
var adisc;
var amnt;

function review(){ 
  

  amnt = document.getElementById('amnt').value;
  disc = document.getElementById('disc').value;
  adisc = total - disc;

  retur = amnt - adisc;
  // alert(amnt);
  document.getElementById('return').innerText = retur;
  
}

var arr = new Array();
function senditems(){

var table = document.getElementById('cart-tb');
var i=0;

        for (var r = 1, n = table.rows.length; r < n; r++) {
            // for (var c = 1, m = 1; c = m; c++) {
               arr[i] = table.rows[r].cells[1].innerHTML;
               i++;
            // }
        }
      }

$(document).keypress(function(e) {
    if(e.which == 13) {
      var a = document.getElementById('amnt').value;
      var b = document.getElementById('disc').value;

      if (b == "") {
        alert("Discount must be filled out");
        return false;
      }
      else if (a == "") {
        alert("Amount must be filled out");
        return false;
      }
      else{
        senditems();
        ajaxcontrol();
      }
    }
});
$(".clickable").click(function() { 
  var a = document.getElementById('amnt').value;
      var b = document.getElementById('disc').value;

      if (b == "") {
        alert("Discount must be filled out");
        return false;
      }
      else if (a == "") {
        alert("Amount must be filled out");
        return false;
      }
      else{senditems(); ajaxcontrol();} 
    });
                
function ajaxcontrol(){
    var arr1 = JSON.stringify(arr);
    $.ajax({
        type: "POST",
        url: 'payment.php',
        data: {arrayer: arr1, amount: amnt, discount: disc, adiscount: adisc, return: retur, titems: row_count, amtot: total},
        cache: false,
        success: function(data)
        {
          $.notify({
              title: '<strong>Success!</strong>',
              message: 'The bill successfully generated and printed.',
              animate: {
                  enter: 'animated flipInY',
                  exit: 'animated flipOutX'
                }
            },{
              type: 'success'
            });
          $("#cart-tb > tbody > tr").remove();
          $('#disc').val('');
          $('#amnt').val('');
          $('#return').val('');
        }
    });
};

var pno,pname,cate,price
$( ".productName" ).select2({    
    placeholder: "8573", 
    // theme: "bootstrap",   
    ajax: {
        url: "productsList.php",
        dataType: 'json',
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        processResults: function (data) {
            return {
                results: data
            };

        },
        cache: false
    },
    minimumInputLength: 1
});

$( ".productName" ).on("select2:select", function(e) {
          var pno = $(this).select2('data')[0].id;
          var pna = $(this).select2('data')[0].pname;
          var cate = $(this).select2('data')[0].category;
          var pric = $(this).select2('data')[0].price;

                var markup = "<tr><td><a id='delete-row' style='color: #000; cursor: pointer;'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td><td>" + pno + "</td><td>" + pna + "</td><td>" + cate + "</td><td class='countable'>" + pric + "</td></tr>";
                $("#cart-tb tbody").append(markup); 
                $('.productName').empty();
                $(".productName").select2("open");
 
        });

$(document).ready(function(){
  $(".productName").select2("open");
});

</script>

</body>
</html>

<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">
  <link rel="stylesheet" href="rmpos.css">
  <link rel="stylesheet" href="plugins/animate.css">

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
              <span class="hidden-xs">User</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/myAvatar.png" class="img-circle" alt="User Image">

                <p>
                  User
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
        <li class="active"><a href=""><i class="fa fa-cart-plus"></i> <span>Cart</span></a></li>
        <li><a href="db.php"><i class="fa fa-book"></i> <span>Stock Book</span></a></li>

        <li class="header">DASHBOARD</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="admin/board"><i class="fa fa-info"></i> <span>Stock Info</span></a></li>
        <li><a href="admin/saleb"><i class="fa fa-area-chart"></i> <span>Sales Info</span></a></li>

        <li class="header">ADMIN TOOLS</li>
        <li><a href="admin/stockmd"><i class="fa fa-database"></i> <span>Stock Management</span></a></li>
        <li><a href="admin/salehistory.php"><i class="fa fa-history"></i> <span>Sales History</span></a></li>
        <li><a href="admin/ac"><i class="fa fa-inr"></i> <span>Accounts</span></a></li>
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
                    <span id="ttotal" class="description-percentage text-blue" style="font-size: 4em;">0</span><br>
                    <span class="description-text">No. of Items</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <div class="col-sm-3 col-xs-6 pull-right">
                  <div class="description-block">
                    <span id="tprice" class="description-percentage text-green" style="font-size: 4em;">₹ 0</span><br>
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
                  <label for="pid">Product Id</label>
                  <input type="text" class="form-control" id="pid" placeholder="2896" autocomplete="off">
                  <div id="pname"></div>
                  <div id="cate"></div>
                  <div id="price"></div>
                  <div id="suggesstion-box-1"></div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button id="add-entry" type="button" class="btn btn-success">Add</button>
              </div>
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
                <button type="submit" class="btn btn-danger">Cancel Bill</button>
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

<script type="text/javascript">
  
</script>

<script type="text/javascript">
  $(function(){
    $('#carttable').height();
    $('#carttable').slimScroll({
        height: '352px'
    });
});
</script>

<script type="text/javascript">
  // AJAX call for autocomplete 
    $(document).ready(function(){
      $("#pid").keyup(function(){
        $.ajax({
        type: "POST",
        url: "admin/stockmd/ajax-pidlist.php",
        data:'keyword-pno='+$(this).val(),
        beforeSend: function(){
          $("#pid").css("background","#FFF no-repeat 165px");
        },
        success: function(data){
          $("#suggesstion-box-1").show();
          $("#suggesstion-box-1").html(data);
          $("#pid").css("background","#FFF");
        }
        });
      });
    });


    function selectpid(val) { $("#pid").val(val); $("#suggesstion-box-1").hide(); }
    function selectpname(val) { $("#pname").val(val); }
    function selectcate(val) { $("#cate").val(val); }
    function selectprice(val) { $("#price").val(val); }

    $(document).ready(function(){
        $("#add-entry").click(function(){
            var pid = $("#pid").val();
            var pname = $("#pname").val();
            var cate = $("#cate").val();
            var price = $("#price").val();
            var markup = "<tr><td><a id='delete-row' style='color: #000; cursor: pointer;'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td><td>" + pid + "</td><td>" + pname + "</td><td>" + cate + "</td><td class='countable'>" + price + "</td></tr>";
            $("#cart-tb tbody").append(markup); 
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
              if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
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

$(".clickable").click(function() {
                //alert($(this).attr('id'));
                var arr1 = JSON.stringify(arr);
                $.ajax({
                    type: "POST",
                    url: 'payment.php',
                    data: {arrayer: arr1, amount: amnt, discount: disc, adiscount: adisc, return: retur, titems: row_count, amtot: total},
                    cache: false,
                    success: function(data)
                    {
                      $.notify({
                          title: '<strong>Heads up!</strong>',
                          message: 'You can use any of bootstraps other alert styles as well by default.',
                          animate: {
                              enter: 'animated flipInY',
                              exit: 'animated flipOutX'
                            }
                        },{
                          type: 'success'
                        });
                      setTimeout(function(){
                      location.reload(true); // then reload the page.(3)
                      }, 5000);
                    }
                });
            });

</script>

</body>
</html>

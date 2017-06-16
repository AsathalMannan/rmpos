<?php
 ob_start();
 session_start();
 require_once '../dbconnect.php';

if(isset($_GET["stockinfo"])){
  $loc = "board/";}
else if(isset($_GET["salesinfo"])){
  $loc = "saleb/";}
else if(isset($_GET["stockmd"])){
  $loc = "stockmd/";}
else if(isset($_GET["salehistory"])){
  $loc = "salehistory/";}
else if(isset($_GET["binfo"])){
  $loc = "binfo/";}
else{
  $loc = "board/";
}

 $url = $_POST['url'];

 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {

  header("Location: ".$loc);
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['signin']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $u_name = trim($_POST['username']);
  $u_name = strip_tags($u_name);
  $u_name = htmlspecialchars($u_name);
  
  $pass2 = trim($_POST['password']);
  $pass2 = strip_tags($pass2);
  $pass2 = htmlspecialchars($pass2);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($u_name)){
   $error = true;
   $unameError = "Please enter user name";
  }
  
  if(empty($pass2)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $passhash = hash('sha256', $pass2); // password hashing using SHA256
    $query = "SELECT uname, name, pass FROM users WHERE uname ='$u_name'";
    $row = $conn->query($query);
    $count = mysqli_fetch_assoc($row);
   
   if( $count['uname'] ==$u_name && $count['pass']==$passhash ) {
    $_SESSION['user'] = $count['uname'];
    header("Location: ".$url);
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stock Management | Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <style type="text/css">
    body{
      overflow: hidden;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>RAHMAN</b> MOBILES</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to Stock Management</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    <?php if ( isset($errMSG) ) {?>
          <div class="form-group">
            <div class="alert alert-danger">
              <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
            </div>
          </div>
    <?php } ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="User name" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <span class="text-danger"><?php echo $unameError; ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span class="text-danger"><?php echo $passError; ?></span>
      </div>
      <input type="hidden" class="form-control" name="url" value=<?php echo "\"".$loc."\"" ?>>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin">Sign In</button>
        </div>
        <div class="col-xs-4"></div>
        <!-- /.col -->
      </div>
    </form>

    <a href="//rmpos.app" class="login-box-msg"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Cart Page</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

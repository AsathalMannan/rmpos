<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: /admin/stockmd/stock.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: /admin/stockmd/index.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: /admin/stockmd/index.php");
  exit;
 }
 ?>
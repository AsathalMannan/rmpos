<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: /stockmd/stock.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: /stockmd/index.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: /stockmd/index.php");
  exit;
 }
 ?>
<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: /admin/stockmd/");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: /admin/index.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit;
 }
 ?>
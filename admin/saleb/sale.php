<?php

date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="billdb";
$conn = mysqli_connect("localhost", $username, $password, $database);

$m = date("m"); $d = date("d"); $y = date("y"); 
$date1 = $y."-".$m."-01";
 $end_date1 = $y."-".$m."-31";


?>
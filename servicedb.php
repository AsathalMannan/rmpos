<?php
date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="service_db";
$conn = mysqli_connect("localhost", $username, $password, $database);

//getting POST data
$dname = $_POST['var1'];
$descrip = $_POST['var2'];
$customer = $_POST['var3'];
$amount = $_POST['var4'];

//getting date and time
$date = date('Y-m-d');

$q_insert = "INSERT INTO servicetb (`sdate`, `dname`, `descrip`, `customer`, `amount`) VALUES ('".$date."','".$dname."','".$descrip."','".$customer."','".$amount."')";
$result1 = mysqli_query($conn, $q_insert);

?>
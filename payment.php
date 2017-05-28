<?php
$data = $_POST['arrayer'];
$amount = $_POST['amount'];
$discount = $_POST['discount'];
$adiscount = $_POST['adiscount'];
$return = $_POST['return'];

$myfile = fopen("filename.txt", "w") or die("Unable to open file!");
fwrite($myfile, $amount);
fclose($myfile);
?>
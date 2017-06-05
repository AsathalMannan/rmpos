<?php

<?php
date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="stock";
$conn = mysqli_connect("localhost", $username, $password, $database);

//getting POST data
$arrayer0 = json_decode(stripslashes($_POST['arrayer0']));
$arrayer1 = json_decode(stripslashes($_POST['arrayer1']));
$arrayer2 = json_decode(stripslashes($_POST['arrayer2']));
$ledger = $_POST['ledger'];



?>
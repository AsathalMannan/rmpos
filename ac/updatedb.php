<?php
date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="accounts";
$conn = mysqli_connect("localhost", $username, $password, $database);

//getting POST data
$arrayer0 = json_decode(stripslashes($_POST['arrayer0']));
$arrayer1 = json_decode(stripslashes($_POST['arrayer1']));
$arrayer2 = json_decode(stripslashes($_POST['arrayer2']));
$ledger = $_POST['ledger'];
$tinc = $_POST['tinc'];
$texp = $_POST['texp'];
$qtype = $_POST['qtype'];

$arrlength = count($arrayer2);
$date = date("Y-m-d");

if($qtype == "Update"){
	$sql2 = "DELETE from collection WHERE rdate='".$date."'";
    $result2 = mysqli_query($conn, $sql2);

    $q_no_order = "SELECT no from collection ORDER BY rdate DESC LIMIT 1";
	$row_no_order = $conn->query($q_no_order);
	$f_no_order = mysqli_fetch_assoc($row_no_order);
	$no_order=$f_no_order["no"];
	$no_order = $no_order + 1;

	$q_alter_no_order = "ALTER TABLE collection AUTO_INCREMENT=".$no_order;
	$row_alter_no_order = $conn->query($q_alter_no_order);

    for($i=0;$i<$arrlength;$i++){
	$q_in_collection = "INSERT INTO `collection` (`rdate`, `name`, `type`, `amount`) VALUES ('".$date."', '".$arrayer0[$i]."', '".$arrayer1[$i]."', '".$arrayer2[$i]."')";
	$row_collection = $conn->query($q_in_collection);
	}

	$sql1 = "UPDATE `ac` SET tinc ='".$tinc."', texp ='".$texp."', tt ='".$ledger."' WHERE rdate='".$date."'";
           $result1 = mysqli_query($conn, $sql1);
}

else if($qtype == "Add"){

for($i=0;$i<$arrlength;$i++){
$q_in_collection = "INSERT INTO `collection` (`rdate`, `name`, `type`, `amount`) VALUES ('".$date."', '".$arrayer0[$i]."', '".$arrayer1[$i]."', '".$arrayer2[$i]."')";
$row_collection = $conn->query($q_in_collection);
}

$q_insert = "INSERT INTO `ac` (`rdate`, `tinc`, `texp`, `tt`) VALUES ('".$date."','".$tinc."','".$texp."','".$ledger."')";
$result1 = mysqli_query($conn, $q_insert);

}

?>
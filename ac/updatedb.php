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

// $content = array();
// $head = array();

// for($i=0;$i<$arrlength;$i++) {
	
// 	$content = array(
// 	'Name' => $arrayer0[$i], 
// 	'Type' => $arrayer1[$i], 
// 	'Amount' => $arrayer2[$i]);
// }

// $head[] = array(
// 	'Date' => $date,
// 	'REPORT' => $content,
// 	'TOTAL INCOME' => $tinc, 
// 	'TOTAL EXPENDITURE' => $texp,
//  	'TODAY TOTAL' => $ledger
// );


// $fp = fopen('accounts-book.json', 'a');
// fwrite($fp, json_encode($head));
// fclose($fp);


?>
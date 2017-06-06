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
$tinc = $_POST['tinc'];
$texp = $_POST['texp'];

$arrlength = count($arrayer2);
$date = date("d-m-y");
$content = array();
$head = array();

for($i=0;$i<$arrlength;$i++) {
	
	$content[] = array(
	'Name' => $arrayer0[$i], 
	'Type' => $arrayer1[$i], 
	'Amount' => $arrayer2[$i]);
}

$head[] = array(
	'Date' => $date,
	'REPORT' => $content,
	'TOTAL INCOME' => $tinc, 
	'TOTAL EXPENDITURE' => $texp,
 	'TODAY TOTAL' => $ledger
);


$fp = fopen('accounts-book.json', 'a');
fwrite($fp, json_encode($head));
fclose($fp);


?>
<?php
date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="stock";
$conn = mysqli_connect("localhost", $username, $password, $database);

// $query = "SELECT pno,pname,category,price FROM stocktb";
// $row_stockdb = $conn->query($query);

//getting POST data
$arrayer = json_decode(stripslashes($_POST['arrayer']));
$amount = $_POST['amount'];
$discount = $_POST['discount'];
$adiscount = $_POST['adiscount'];
$return = $_POST['return'];
$titems = $_POST['titems'];

//getting bill no
$q_billno = "SELECT billno from billdb.`billtb` ORDER BY billno DESC LIMIT 1";
$row_billno = $conn->query($q_billno);
$f_billno = mysqli_fetch_assoc($row_billno);
$billno=$f_billno["billno"];
$billno=$billno+1;

//getting date and time
$date = date('Y-m-d');

//add to billdb
$arrlength = count($arrayer);
for($i=0;$i<$arrlength;$i++) {
    $pid = $arrayer[$i];

$query = "SELECT * FROM stocktb WHERE pno='".$pid."'";
$row_stockdb = $conn->query($query);

while( $f_stock = mysqli_fetch_assoc($row_stockdb)){
                    $pno=$f_stock["pno"];
                    $pname=$f_stock["pname"];
                    $category=$f_stock["category"];
                    $price=$f_stock["price"];
                    $adate=$f_stock["adate"];
                   }

$q_in_billtb = "INSERT INTO billdb.`billtb` (`billno`, `bdate`, `pno`, `pname`, `category`, `price`, `adate`) VALUES ('".$billno."', '".$date."', '".$pno."', '".$pname."', '".$category."', '".$price."', '".$adate."')";
$row_billtb = $conn->query($q_in_billtb);

$q_delete = "DELETE from stocktb WHERE pno='".$pno."'";
$result2 = mysqli_query($conn, $q_delete);
}
?>
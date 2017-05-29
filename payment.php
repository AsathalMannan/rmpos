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
$total = $_POST['amtot'];

//getting bill no
$q_billno = "SELECT billno from billdb.`billtb` ORDER BY billno DESC LIMIT 1";
$row_billno = $conn->query($q_billno);
$f_billno = mysqli_fetch_assoc($row_billno);
$billno=$f_billno["billno"];
$billno=$billno+1;

//getting date and time
$date = date('Y-m-d');

//add to billdb
$items = array();
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

$q_in_billtb = "INSERT INTO billdb.`billtb` (`billno`, `bdate`, `tprice`, `discount`, `cash`, `gtotal`, `chng`) VALUES ('".$billno."', '".$date."', '".$total."', '".$discount."', '".$amount."', '".$adiscount."', '".$return."')";
$row_billtb = $conn->query($q_in_billtb);

$q_insert = "INSERT INTO saletb (`billno`, `pid`, `pname`, `category`, `price`, `adate`) VALUES ('".$billno."','".$pno."','".$pname."','".$category."','".$price."','".$adate."')";
$result1 = mysqli_query($conn, $q_insert);

$items[] = new item($pname , $price) ;



$q_delete = "DELETE from stocktb WHERE pno='".$pno."'";
$result2 = mysqli_query($conn, $q_delete);
}

/*PRINTER CONFIG*/
$subtotal = new item('Subtotal', $total);
$pdiscount = new item('discount', $discount);
$pamount = new item('Cash', $amount);
$ptotal = new item('Total', $adiscount, true);
$pchange = new item('Change', $return, true);


$pdate = date('d-m-Y');

require __DIR__ . '/plugins/escpos-php/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

try {
    
    $connector = new WindowsPrintConnector("EPSON TM-T81 Receipt");

    $printer = new Printer($connector);
    $fonts = array(
	Printer::FONT_A,
	Printer::FONT_B);

    /* Print top logo */
	$printer -> setJustification(Printer::JUSTIFY_CENTER);
    /* Name of shop */
	$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
	$printer -> setFont($fonts[0]);

	$printer -> setEmphasis(true);
	$printer -> text("RAHMAN MOBILES\n");
	$printer -> selectPrintMode();
	$printer -> setEmphasis(false);
	$printer -> text("\n");
	$printer -> feed();

	/* Title of receipt */
	$printer -> setFont();
	$printer -> setEmphasis(true);
	$printer -> text("SALES INVOICE\n");
	$printer -> setEmphasis(false);

	/*RECEIPT DETAILS*/
	$printer -> setJustification(Printer::JUSTIFY_RIGHT);
	$printer -> text("BILL NO: " . $billno . "\n");
	$printer -> text("DATE: " . $pdate . "\n");
	$printer -> setJustification(Printer::JUSTIFY_LEFT);
	$printer -> feed();

	/*ITEMS*/
	$printer -> setJustification(Printer::JUSTIFY_LEFT);
	$printer -> setEmphasis(true);
	$printer -> text(new item('Products', 'Price'));
	$boxUP = str_repeat("\xc4", 48)."\n";
	$printer -> textRaw($boxUP);
	$printer -> setEmphasis(false);
	foreach ($items as $item) {
	    $printer -> text($item);
	}
	$boxDOWN = str_repeat("\xc4", 48)."\n";
	$printer -> textRaw($boxDOWN);
	$printer -> feed();


	/* Tax and total */
	$printer -> text($subtotal);
	$printer -> text($pdiscount);
	$printer -> text($pamount);
	$printer -> setEmphasis(true);
	$printer -> text($ptotal);
	$printer -> text($pchange);
	$printer -> setEmphasis(false);

	/* Footer */
	$printer -> feed(2);
	$printer -> setJustification(Printer::JUSTIFY_CENTER);
	$printer -> text("Thank you for shopping at Rahman Mobiles\n");

	$printer -> cut();
    
    /* Close printer */
    $printer -> close();
	} catch (Exception $e) {
		echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
	}

	class item
{
    private $name;
    private $price;
    private $rupeesign;

    public function __construct($name = '', $price = '', $rupeesign = false)
    {
        $this -> name = $name;
        $this -> price = $price;
        $this -> rupeesign = $rupeesign;
    }

    public function __toString()
    {
        $rightCols = 10;
        $leftCols = 38;
        // if ($this -> rupeesign) {
        //     $leftCols = $leftCols / 2 - $rightCols / 2;
        // }
        $left = str_pad($this -> name, $leftCols) ;

        $sign = ($this -> rupeesign ? 'Rs. ' : '');
        $right = str_pad($sign . $this -> price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }
}
?>
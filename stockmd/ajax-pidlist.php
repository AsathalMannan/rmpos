<style type="text/css">
	.custom-ul{
		background: #333;
		color: white;
		opacity: 0.95;
		list-style: none;
		position: absolute;
		width: 100%;
		padding:0;
		margin-right: -10px;

	}
	.custom-li{
		cursor: pointer;
		margin: 1em;
		border: 1px white;
	}
	.sub-text{
		float: right;
		font-style: italic;
	}
</style>
<?php
$username="root";
$password="pass123";
$database="stock";
$conn = mysqli_connect("localhost", $username, $password, $database);
//require_once("dbcontroller.php");
//$db_handle = new DBController();

//pno-ajax
if(!empty($_POST["keyword-pno"])) {
$query ="SELECT pno,pname,category,price FROM stocktb WHERE pno like '" . $_POST["keyword-pno"] . "%' ORDER BY pno LIMIT 0,6";
//$result = $db_handle->runQuery($query);
	$result = $conn->query($query);
if(!empty($result)) {
?>
<ul id="pidlist" class="custom-ul">
<?php
foreach($result as $pid) {
?>
<!-- <li onClick="selectpid('<?php echo $pid["pno"]; ?>');" class="custom-li"><?php echo $pid["pno"];?>
	<span class="pull-right"><?php echo $pid["pname"]; ?></span>
</li> -->
<li onClick="selectpid('<?php echo $pid["pno"]; ?>');
		selectpname('<?php echo $pid["pname"]; ?>');
		selectcate('<?php echo $pid["category"]; ?>');
		selectprice('<?php echo $pid["price"]; ?>');" 
	class="custom-li">
	<?php echo $pid["pno"];?>
	<span class="sub-text"><?php echo $pid["pname"]; ?></span>
</li>
<?php } ?>
</ul>
<?php } }


//pname-ajax
if(!empty($_POST["keyword-pname"])) {
$query ="SELECT pno,pname,category,price FROM stocktb WHERE pname like '" . $_POST["keyword-pname"] . "%' ORDER BY pname LIMIT 0,6";
//$result = $db_handle->runQuery($query);
	$result = $conn->query($query);
if(!empty($result)) {
?>
<ul id="pnamelist" class="custom-ul">
<?php
foreach($result as $pname) {
?>

<li onClick="selectpid('<?php echo $pname["pno"]; ?>');
		selectpname('<?php echo $pname["pname"]; ?>');
		selectcate('<?php echo $pname["category"]; ?>');
		selectprice('<?php echo $pname["price"]; ?>');" 
	class="custom-li">
	<?php echo $pname["pname"];?>
	<span class="sub-text"><?php echo $pname["pno"]; ?></span>
</li>
<?php } ?>
</ul>
<?php } }


 ?>
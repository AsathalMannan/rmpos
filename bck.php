<?php
date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="accounts";
$conn = mysqli_connect("localhost", $username, $password, $database);

$optype = $_POST['optype'];
if($optype == "bck"){
	$backup_file = "bck-". date("Y-m-d-h-i") . '.sql';
	exec("C:/xampp/mysql/bin/mysqldump --user=root --password=pass123 --host=localhost --skip-comments --skip-add-locks --databases stock servicedb billdb accounts userdb > D:/Backup/".$backup_file);
}

elseif($optype == "rstr"){
	$filename = $_POST['filename'];
	exec("C:/xampp/mysql/bin/mysql --user=root --password=pass123 --host=localhost < D:/Backup/".$filename);
}

elseif($optype == "trunc"){
	$bname = $_POST['bname'];
	if($bname == "bill"){ 
		$sql2 = "TRUNCATE TABLE billdb.billtb";
    	$result2 = mysqli_query($conn, $sql2); }

	elseif($bname == "service"){ 
		$sql2 = "TRUNCATE TABLE servicedb.servicetb";
    	$result2 = mysqli_query($conn, $sql2); }
	elseif($bname == "sales"){ 
		$sql2 = "TRUNCATE TABLE stock.saletb";
    	$result2 = mysqli_query($conn, $sql2); }
}
?>
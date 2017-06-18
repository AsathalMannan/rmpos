<?php

$username="root";
$password="pass123";
$database="accounts";
$conn = mysqli_connect("localhost", $username, $password, $database);

$optype = $_POST['optype'];
if($optype == "bck"){
	$backup_file = "stock-". date("Y-m-d-H-i-s") . '.sql';
	exec("C:/xampp/mysql/bin/mysqldump --user=root --password=pass123 --host=localhost stock > D:/Backup/".$backup_file);
	$backup_file = "service_db-". date("Y-m-d-H-i-s") . '.sql';
	exec("C:/xampp/mysql/bin/mysqldump --user=root --password=pass123 --host=localhost service_db > D:/Backup/".$backup_file);
	$backup_file = "billdb-". date("Y-m-d-H-i-s") . '.sql';
	exec("C:/xampp/mysql/bin/mysqldump --user=root --password=pass123 --host=localhost billdb > D:/Backup/".$backup_file);
	$backup_file = "accounts-". date("Y-m-d-H-i-s") . '.sql';
	exec("C:/xampp/mysql/bin/mysqldump --user=root --password=pass123 --host=localhost accounts > D:/Backup/".$backup_file);
	$backup_file = "userdb-". date("Y-m-d-H-i-s") . '.sql';
	exec("C:/xampp/mysql/bin/mysqldump --user=root --password=pass123 --host=localhost userdb > D:/Backup/".$backup_file);
}

elseif($optype == "trunc"){
	$bname = $_POST['bname'];
	if($bname == "bill"){ 
		$sql2 = "TRUNCATE TABLE billdb.billtb";
    	$result2 = mysqli_query($conn, $sql2); }

	elseif($bname == "service"){ 
		$sql2 = "TRUNCATE TABLE service_db.servicetb";
    	$result2 = mysqli_query($conn, $sql2); }
	elseif($bname == "sales"){ 
		$sql2 = "TRUNCATE TABLE stock.saletb";
    	$result2 = mysqli_query($conn, $sql2); }
}
?>
<?php 

// connect to database 
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'pass123');
define('DB_NAME', 'stock');
$conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// strip tags may not be the best method for your project to apply extra layer of security but fits needs for this tutorial 
$search = strip_tags(trim($_GET['q'])); 

// Do Prepared Query 
$query = $conn->prepare("SELECT pno,pname,category,price FROM stocktb WHERE pno LIKE :search LIMIT 0,6");

// Add a wildcard search to the search variable
$query->execute(array(':search'=>"".$search."%"));

// Do a quick fetchall on the results
$list = $query->fetchall(PDO::FETCH_ASSOC);

// Make sure we have a result
if(count($list) > 0){
   foreach ($list as $key => $value) {
    $data[] = array('id' => $value['pno'], 'text' => $value['pno']."-".$value['pname'], 'pname' => $value['pname'], 'category' => $value['category'], 'price' => $value['price']);              
   } 
} else {
   $data[] = array('id' => '0', 'text' => 'No Products Found');
}

// return the result in json
echo json_encode($data);


?>
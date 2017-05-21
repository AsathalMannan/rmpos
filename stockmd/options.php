<?php
$username="root";
$password="pass123";
$database="stock";
$con = mysqli_connect("localhost", $username, $password, $database);

  $pid = trim($_POST['pid']);
  $pid = strip_tags($pid);
  $pid = htmlspecialchars($pid);

    $pname = trim($_POST['pname']);
  $pname = strip_tags($pname);
  $pname = htmlspecialchars($pname);

    $cate = trim($_POST['cate']);
  $cate = strip_tags($cate);
  $cate = htmlspecialchars($cate);

    $price = trim($_POST['price']);
  $price = strip_tags($price);
  $price = htmlspecialchars($price);

 if(isset($_POST["add"])){
		
		 echo $cate;
		  	

	           // $sql = "INSERT into stocktb (pno,pname,category,price) 
            //        values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')";
            //        $result = mysqli_query($con, $sql);
				// if(!isset($result))
				// {
				// 	echo "<script type=\"text/javascript\">
				// 			alert(\"Invalid File:Please Upload CSV File.\");
				// 			window.location = \"stock.php\"
				// 		  </script>";		
				// }
				
				// else {
				// 	  echo "<script type=\"text/javascript\">
				// 		alert(\"CSV File has been successfully Imported.\");
				// 		window.location = \"stock.php\"
				// 	</script>";
				// }
	         
	}

if(!isset($_POST["add"])){
	echo "<script type=\"text/javascript\">
			alert(\"Invalid File: Please Select file.\");
			window.location = \"stock.php\"
		  </script>";
}	 


 ?>
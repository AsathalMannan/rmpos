<?php

date_default_timezone_set('Asia/Kolkata');
$username="root";
$password="pass123";
$database="stock";
$con = mysqli_connect("localhost", $username, $password, $database);

$date = date("Y-m-d");

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

       $sql = "INSERT into stocktb (pno,pname,category,price) 
           values ('".$pid."','".$pname."','".$cate."','".$price."','".$date."')";
           $result = mysqli_query($con, $sql);
		if(!isset($result))
		{
			echo "<script type=\"text/javascript\">
					alert(\"Invalid Entry, Try again !!\");
					window.location = \"index.php\"
				  </script>";		
		}
		
		else {
			  echo "<script type=\"text/javascript\">
				alert(\"Added '".$pname."' in Database successfully !\");
				window.location = \"index.php\"
			</script>";
		}
     
	}

if(isset($_POST["update"])){

       $sql1 = "UPDATE stocktb SET pno ='".$pid."', pname ='".$pname."', category ='".$cate."', price ='".$price."' WHERE pno='".$pid."'";
           $result1 = mysqli_query($con, $sql1);
		if(!isset($result1))
		{
			echo "<script type=\"text/javascript\">
					alert(\"Invalid Entry, Try Again !!\");
					window.location = \"index.php\"
				  </script>";		
		}
		
		else {
			  echo "<script type=\"text/javascript\">
				alert(\"Updated '".$pname."' in Database successfully !\");
				window.location = \"index.php\"
			</script>";
		}
	         
	}

if(isset($_POST["delete"])){

       $sql2 = "DELETE from stocktb WHERE pno='".$pid."'";
           $result2 = mysqli_query($con, $sql2);
		if(!isset($result2))
		{
			echo "<script type=\"text/javascript\">
					alert(\"Invalid Entry, Try Again !!\");
					window.location = \"index.php\"
				  </script>";		
		}
		
		else {
			  echo "<script type=\"text/javascript\">
				alert(\"Deleted '".$pname."' from Database permenently !\");
				window.location = \"index.php\"
			</script>";
		}
	         
	}


 ?>
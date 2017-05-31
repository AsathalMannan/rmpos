<?php
$username="root";
$password="pass123";
$database="stock";
$con = mysqli_connect("localhost", $username, $password, $database);

 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		


		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {


	           $sql = "INSERT into stocktb (pno,pname,category,price) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')";
                   $result = mysqli_query($con, $sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"stock.php\"
						  </script>";		
				}
				
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"stock.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}

if(!isset($_POST["Import"])){
	echo "<script type=\"text/javascript\">
			alert(\"Invalid File: Please Select file.\");
			window.location = \"stock.php\"
		  </script>";
}	 


 ?>
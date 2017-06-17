<?php
$username="root";
$password="pass123";
$database="userdb";
$conn = mysqli_connect("localhost", $username, $password, $database);

$uname = $_POST['username'];
$name = $_POST['fname'];
$role = $_POST['prole'];
$pass = $_POST['password'];
$type = $_POST['updatetype'];

$passhash = hash('sha256', $pass); 

if($type == "add"){
	$q_in_user = "INSERT into users (uname,name,role,pass) values ('".$uname."','".$name."','".$role."','".$passhash."')";
	$result = mysqli_query($conn, $q_in_user);
}
elseif($type == "update"){
	$q_in_user = "UPDATE users SET name ='".$name."', role ='".$role."', pass ='".$passhash."' WHERE uname='".$uname."'";
	$result = mysqli_query($conn, $q_in_user);
}
elseif($type == "delete"){
	$q_in_user = "DELETE from users WHERE uname='".$uname."'";
	$result = mysqli_query($conn, $q_in_user);
}
?>
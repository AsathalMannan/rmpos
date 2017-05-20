<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );
$username="root";
$password="pass123";
$database="userdb";
$conn = mysqli_connect("localhost", $username, $password, $database);
?>
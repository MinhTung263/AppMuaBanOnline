<?php 
$hostname="localhost";
$dbname="shop";
$username="root";
$password="";
	$connect=mysqli_connect($hostname,$username,$password,$dbname);
	mysqli_set_charset($connect,"utf8");
	header('Content-Type: application/json');

 ?>
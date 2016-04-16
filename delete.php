<?php 
include('functions/header.php');
$conn = mysqli_connect('localhost', 'root', '', 'bluezon_zones');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$id_photo 	= $_GET['id'];
$date 		= date('Y-m-d');

$delete_query = 	"UPDATE photos 
					SET date_deleted ='$date'
					WHERE id = $id_photo";
	
$delete_result = mysqli_query($conn, $delete_query);

if ($delete_result) {
 		echo "<div id='talon' class='bg-info col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1'>";		
		echo "Успешно изтрихте снимката от базата данни!";
		echo "<p><a href='read.php'><button class='btn-primary btn-lg btn-block'>Виж Снимките...</button></a></p>";
	}else{
		echo "Неуспешно изтриване на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}

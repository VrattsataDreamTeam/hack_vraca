<?php
header('location: read.php');
session_start();
$worker_id=$_SESSION['worker_id'];
$zone_id=$_SESSION['zone_id'];
 $conn = mysqli_connect('localhost', 'bluezon_main', 'vratsahack5', 'bluezon_zones');
mysqli_set_charset($conn, 'utf8');

                  	

if(!empty($_GET)) {
	$id_photo= $_GET['id'];
} 
// echo '<pre>';
// print_r($_FILES);
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="jquery-1.11.3.min.js"></script>
</head>
<body>
<form action="img.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file_img"/>
	<input type="submit" name="submit" value="Upload"/>
</form>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'zones');
mysqli_set_charset($conn, 'utf8');

date_default_timezone_set('Europe/Sofia');
$today = date("j-F-Y, g:i a");

if(isset($_POST['submit'])){
	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	$filepath = "DB/" . $filename;
	if(move_uploaded_file($filetmp, $filepath)){

		$q = "INSERT INTO `photos`(`zone_id`, `worker_id`, `photo_dir`, `photo_name`, `photo_type`, `date`) 
				VALUES ($zone_id, $worker_id, '$filepath', '$filename' ,'$filetype', '$today')";
		if (mysqli_query($conn, $q)) {
										echo "<p>Успешно записахте снимка</p>";
									} else {
										echo "Опитайте отново!";
									}
	}
}
?>
</body>
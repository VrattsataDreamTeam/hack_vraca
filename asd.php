<?php 
session_start();
include('functions/header.php');
$conn = mysqli_connect('localhost', 'root', '', 'zones');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$worker_id=$_SESSION['worker_id'];
$zone_id=$_SESSION['zone_id'];
?>
<div class="container">
  <h2>Simple Collapsible</h2>
  <a href="#img" class="btn btn-info" data-toggle="collapse">Simple collapsible</a>
<?php
$read_query = "SELECT * FROM photos JOIN zones
			 	ON photos.zone_id=zones.zone_id JOIN workers ON photos.worker_id=workers.worker_id

			 	WHERE  photos.date_deleted IS NULL AND photos.worker_id=$worker_id AND photos.date is not NULL";
$read_result = mysqli_query($conn, $read_query);
echo '<a id="upload-pic" href="#img" class="btn btn-info data-toggle="collapse"> Качи снимка</a>';
echo '<div id="demo" class="collapse">';
 echo '<form action="img.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file_img"/>
	<input type="submit" name="submit" value="Upload"/>
</form>';
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


 
                  	
//date_default_timezone_set('Europe/Sofia');

if(!empty($_GET)) {
	$id_photo= $_GET['id'];}
echo '</div>';
?>
</div>

</body>
</html>

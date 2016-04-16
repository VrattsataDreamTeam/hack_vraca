<?php
session_start();
$worker_id=$_SESSION['worker_id'];
$zone_id=$_SESSION['zone_id'];
 $conn = mysqli_connect('localhost', 'root', '', 'zones');
 
                  	
//date_default_timezone_set('Europe/Sofia');

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
	<form method="post" action="img.php" enctype="multipart/form-data">
		<input type="hidden" name="photo_id" value="<?php  if (isset ($id_photo)){ echo $id_photo; }?>">
		<label for="ph">изберете снимка</label>
		<input type="file" name="photo" id="ph">
		<input type="submit" name="submit" value="запиши" >
	</form>
	<?php
	
						if (isset($_POST['submit'])) {
							$id_photo = $_POST['photo_id'];
						
							date_default_timezone_set('Europe/Sofia');
							$today = date("j-F-Y, g:i a");
		
							if(!empty($_FILES))		{	
								$file_name = $_FILES['photo']['name'];
								$tmp_name = $_FILES['photo']['tmp_name'];
								$file_size = $_FILES['photo']['size'];
								$file_type = $_FILES['photo']['type'];
								
								$content = addslashes(file_get_contents($tmp_name));
//insering picture into the
								$q = "UPDATE `photos` 
								SET `photo`='$content',
									`name_photo`='$file_name',
									`type_photo`='$file_type',
									`size_photo`='$file_size',
									`date`='$today'
								WHERE `photo_id` = $id_photo";
								if (mysqli_query($conn, $q)) {
									echo "<p>Успешно записахте снимка</p>";
									$q = "SELECT `photo` FROM `photos` WHERE photo_id = $id_photo";
									$result = mysqli_query($conn, $q);
									$row = mysqli_fetch_assoc($result);
									$insert_query = "INSERT INTO photos(zone_id,worker_id)
                                    VALUES ('$zone_id','$worker_id')";
                                    $insert_result= mysqli_query($conn,$insert_query);

									echo "<p><a href='read.php'>Read DB</a></p>";
									//echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
								} else {
									echo "Опитайте отново!";
								}
							}
			}
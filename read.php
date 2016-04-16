<a id="upload-pic" href="#img" class="btn btn-info" data-toggle="collapse">Качи снимка</a>
<?php
session_start();
include('functions/header.php');
$conn = mysqli_connect('localhost', 'root', '', 'zones');

$worker_id=$_SESSION['worker_id'];
$zone_id=$_SESSION['zone_id'];
$read_query = "SELECT * FROM photos JOIN zones
			 	ON photos.zone_id=zones.zone_id JOIN workers ON photos.worker_id=workers.worker_id

			 	WHERE  photos.date_deleted IS NULL AND photos.worker_id=$worker_id AND photos.date is not NULL";
$read_result = mysqli_query($conn, $read_query);
echo "<div class='row'>";
echo "<div class='col-md-2 col-md-offset-5 col-xs-10 col-xs-offset-1'>";
echo '<p><a href="free.php?zone_id='.$zone_id.'" class="btn btn-primary btn-default btn-block">Назад </a></p></div></div>';
echo '<div id="img" class="collapse">';
 echo '<p><form action="img.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file_img"/>
	<input type="submit" name="submit" value="Качи"/>
</form></p>';
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


if(!empty($_GET)) {
	$id_photo= $_GET['id'];}
echo '</div>';
echo "<div class='row'>";
echo "<div class='table-responsive'>";
echo "<table class='table'>";
echo '<tr>';
		echo '<td>Служител</td>';
		echo '<td>Синя зона</td>';
		echo '</tr>';
		
		echo '</tr>';
	if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){ 
			echo '<tr>';
			echo '<td>'.$row['worker_name'].'</td>';
			echo '<td>'.$row['zone_address'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id="imgtd" colspan="2"><img id="img1" src="'. $row['photo_dir']. '" class="img-responsive" width="50%" height="20%" data-toggle="modal" data-target="#myModal'.$row['id'].'"/>
			<a id="delete-btn" href="delete.php?id='.$row['id'].'" class="btn btn-danger btn-sm btn-responsive">Delete</a></td>';
			echo '</tr>';
			echo '<td colspan="2">Дата и час на качване</td>';
			//echo '<td colspan="2">Регистрационен номер</td>';
			//echo '<tr>';
			//echo '<td colspan="2">'.$row['Reg_number'].'</td>';
			//echo '</tr>';
			echo '<tr>';
			echo '<td colspan="2">'.$row['date'].'</td>';
			echo '</tr>';
			
			echo '<tr>';
			
			echo '<div class="modal fade" id="myModal'.$row['id'].'" role="dialog">';
				echo '<div class="modal-dialog">';
					echo '<div class="modal-content">';
						echo '<div class="modal-header">';
							echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
							echo '<h4 class="modal-title">Снимка</h4>';
						echo '</div>';
							echo '<div class="modal-body">';
								echo '<p><center><img id="img2" src="'. $row['photo_dir'] . '" class="img-responsive"/></center></p>';
							echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			// echo '<a href=”#” class=”back-to-top” style=”display: inline;”>
	 
			// 		<i class=”fa fa-arrow-circle-up”></i>
					 
			// 		</a>';
		}

	}
echo "</table></div>";
echo "</div>";
?>
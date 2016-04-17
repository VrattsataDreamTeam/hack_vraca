<?php 
include_once('functions/header.php');
$conn = mysqli_connect('localhost', 'root', '', 'zones');

if (isset($_GET['id'])) {
	
		$place_id = $_GET['id'];	


	$read_busy_place = "SELECT * FROM `places` 
							LEFT JOIN `zones`
								ON `places`.`zone_id`=`zones`.`zone_id` 
							LEFT JOIN `statuses` 
								ON `places`.`status_id`=`statuses`.`status_id` 
						WHERE `places`.`place_id`=$place_id";
	$busy_place_result = mysqli_query($conn, $read_busy_place);
	$row = mysqli_fetch_assoc($busy_place_result);
?>
	<form action="update.php" method="post">

		<input type="hidden" name="place_id" value="<?php echo $row['place_id']; ?>">
		<?php echo $row['place_id'];  ?>
		<select name="status_id">				
<?php	
		$read_status = "SELECT * FROM `statuses` 
							WHERE `date_deleted` IS NULL";
		$read_status_result = mysqli_query($conn, $read_status);
			if (mysqli_num_rows($read_status_result) > 0) {
				while($row = mysqli_fetch_assoc($read_status_result)){
?>
			<option value="<?php echo $row['status_id']?>" ><?php echo $row['status_name']?> </option>
<?php
				}
			}
	?>
</select>
<input type="submit" name="submit" value="Заето">
</form>

<?php
}
	if(isset($_POST['submit'])){
		$place_id = $_POST['place_id'];
		$status_id = $_POST['status_id'];
				
			$update_place = "UPDATE `places` 
								SET `status_id`=$status_id 
							WHERE `place_id`=$place_id";
					
			$update_place_result= mysqli_query($conn, $update_place);
				if ($update_place_result) {
					echo "<h3>$place_id е заето!</h3>";
					echo "<a href='create.php'>айде</a>";
				}
				else{
					echo "<h3>Възникна проблем!</h3>";
				}
	}
?>
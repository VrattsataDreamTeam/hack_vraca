<?php 
session_start();
$zone_id=$_SESSION['zone_id'];

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
	<form action="talon.php" method="post">

		<input type="hidden" name="place_id" value="<?php echo $row['place_id']; ?>">
		<?php echo $row['place_id'];  ?>
		<label>Цена престой:</label>
		<select name="price">
			<option value="0.40">0.40</option>
			<option value="0.50">0.50</option>
			<option value="0.70">0.70</option>
			<option value="1.00">1.00</option>
			<option value="2.00">2.00</option>
			<option value="3.00">3.00</option>
			<option value="4.00">4.00</option>
			<option value="6.00">6.00</option>
		</select>
			<br/>
			<?php 
			date_default_timezone_set('Europe/Sofia');
			echo "Час:".$date_now = date('h:i:s'); ?>
			<br/>
		<label>Престой:</label>
		<select name="duration">
			<option value="30 minute">30 мин</option>
			<option value="1 hour">1 час</option>
			<option value="2 hour">2 часа</option>
			<option value="3 hour">3 часа</option>
		</select>


<input type="submit" name="submit" value="Заето">
</form>
<?php
	}
	if (isset($_POST['submit'])) {
		date_default_timezone_set('Europe/Sofia');
		$zone_id=$_SESSION['zone_id'];
		$place_id = $_POST['place_id'];
		$price = $_POST['price']; 
		$duration=$_POST['duration'];
		$time_start = date('h:i:s');
		$end_time = date('h:i:s', strtotime("+ $duration"));

		$update_busy_place = "UPDATE `places` 
								SET `price`=$price,
									`time_start`= '$time_start',
									`time_end`='$end_time' 
							  WHERE `place_id`=$place_id ";
		$update_result= mysqli_query($conn, $update_busy_place);
	if ($update_result) {
 				
		echo "
			Синя зона ВРАЦА <br/>
			$place_id е заето <br/>
			за $duration <br/>
			от $time_start <br/>
			до $end_time <br/>
			цена за престой: $price <br/>
		";
		echo "Избери операция:";
		echo "<form action='busy.php' method='get'>";
		echo "<select name='zone_id'>";
		
		echo "<option value='$zone_id'><a href='busy.php'>Заети места</a></p></option>";
		echo "<option value='$zone_id'><a href='free.php'>Свободни</a></p></option>";
		echo "<input type='submit' name='submit' value='избери'>";
		
		echo "</form>";
		
	}else{
		echo "Неуспешна промяна! Опитайте пак!";
		echo "<p><a href='busy_place.php'>Заети места</a></p>";
	}
}
	
?>
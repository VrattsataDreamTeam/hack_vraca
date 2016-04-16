<?php
include_once('functions/header.php');
session_start();
$zone_id=$_SESSION['zone_id'];

$conn = mysqli_connect('localhost', 'bluezon_main', 'vratsahack5', 'bluezon_zones');
mysqli_set_charset($conn, 'utf8');

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
	
?><div id='talon' class="bg-info col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
	<form action="talon.php" method="post" class="form-horizontal">

		<input type="hidden" name="place_id" value="<?php echo $row['place_id']; ?>">
		
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


<div class="form-group"><input class="btn-primary btn-lg btn-block" type="submit" name="submit" value="Заето"></div>
</form></div>
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
 		
 		echo "<div id='talon' class='bg-info col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1'>";		
		echo "Синя зона ВРАЦА <br/>
			място  $place_id заето <br/>
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
		echo "<div class='form-group'><input class='btn-primary btn-lg btn-block' type='submit' name='submit' value='избери'></div>";
		
		echo "</form></div>";
		
	}else{
		echo "Неуспешна промяна! Опитайте пак!";
		echo "<p><a href='busy_place.php'>Заети места</a></p>";
	}
}
	
?>
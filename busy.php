<?php 
session_start();
include_once('functions/header.php');
$conn = mysqli_connect('localhost', 'bluezon_main', 'vratsahack5', 'bluezon_zones');
mysqli_set_charset($conn, 'utf8');

$zone_id=$_SESSION['zone_id'];

$username1=$_SESSION['username'];


	$read_busy_place = "SELECT * FROM `places` 
							LEFT JOIN `zones`
								ON `places`.`zone_id`=`zones`.`zone_id` 
							LEFT JOIN `statuses` 
								ON `places`.`status_id`=`statuses`.`status_id` 
						WHERE `places`.`date_deleted` IS NULL AND `places`.`status_id`=2
						AND `places`.`zone_id`= $zone_id
						ORDER BY `places`.`place_id`";
	$busy_place_result = mysqli_query($conn, $read_busy_place);
echo "<div id='greeting' class='col-xs-12 col-md-12  col-sm-12'>".$username1." "."Избери Операция:</span>";
	echo '<p><div id="worker_menu"><ol class="breadcrumb">
  <li><a href="free.php?zone_id='.$zone_id.'">Свободни Места</a></li>
  <li><a href="busy.php">Заети Места</a></li>
  <li><a href="read.php">Снимки</a></li>
</ol></p></div>';
echo "<p><div class='table-responsive'>";
echo "<center><table border='0' class='table table-hover'>";
echo "<tr>
	  	
	  	<td>Място</td>
	  	
	  	<td>Начало</td>
	  	<td>Край</td>
	  	<td>Цена</td>
	  	<td>Освобождаване</td>
	  	<td>Талон</td>
	  </tr>";
	if (mysqli_num_rows($busy_place_result) > 0) {
		while($row = mysqli_fetch_assoc($busy_place_result)){
		echo '<tr>';
		echo '<td>'.$row['place_id'].'</td>';
		
		echo '<td>'.$row['time_start'].'</td>';
		echo '<td>'.$row['time_end'].'</td>';
		echo '<td>'.$row['price'].'</td>';
		echo '<td>'.'<a href="busy_to_free.php?id='.$row['place_id'].'">Освободи</a>'.'</td>';
		echo '<td>'.'<a href="talon.php?id='.$row['place_id'].'">Талон</a>'.'</td></tr>';
		}

	}

echo "</table></p></center></div></div>";
?>
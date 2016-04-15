<?php 
session_start();
include_once('functions/header.php');
$zone_id=$_POST['zone_id'];
$conn = mysqli_connect('localhost', 'root', '', 'zones');
echo $zone_id;
	$read_busy_place = "SELECT * FROM `places` 
							LEFT JOIN `zones`
								ON `places`.`zone_id`=`zones`.`zone_id` 
							LEFT JOIN `statuses` 
								ON `places`.`status_id`=`statuses`.`status_id` 
						WHERE `places`.`date_deleted` IS NULL AND `places`.`status_id`=1
						AND `places`.`zone_id`= $zone_id
						ORDER BY `places`.`place_id`";
	$busy_place_result = mysqli_query($conn, $read_busy_place);

echo "<table border='1'>";
echo "<tr>
	  	<td>Зона</td>
	  	<td>Място</td>
	  	<td>Свободни</td>
	  	<td>Заемане</td>
	  </tr>";
	if (mysqli_num_rows($busy_place_result) > 0) {
		while($row = mysqli_fetch_assoc($busy_place_result)){
		echo '<tr><td>'.$row['zone_address'].'</td>';
		echo '<td>'.$row['place_id'].'</td>';
		echo '<td>'.$row['status_name'].'</td>';
		echo '<td>'.'<a href="update.php?id='.$row['place_id'].'">Заеми</a>'.'</td></tr>';
		}

	}

echo "</table>";
?>
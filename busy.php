<?php 
<<<<<<< HEAD

=======
>>>>>>> 4a020f8505deb974512d1e9c7e6e7a4d6ed5211c
$conn = mysqli_connect('localhost', 'root', '', 'zones');

	$read_busy_place = "SELECT * FROM `places` 
							LEFT JOIN `zones`
								ON `places`.`zone_id`=`zones`.`zone_id` 
							LEFT JOIN `statuses` 
								ON `places`.`status_id`=`statuses`.`status_id` 
<<<<<<< HEAD
						WHERE `places`.`date_deleted` IS NULL AND `places`.`status_id`=1
=======
						WHERE `places`.`date_deleted` IS NULL AND `places`.`status_id`=2
>>>>>>> 4a020f8505deb974512d1e9c7e6e7a4d6ed5211c
						ORDER BY `places`.`place_id`";
	$busy_place_result = mysqli_query($conn, $read_busy_place);

echo "<table border='1'>";
echo "<tr>
	  	<td>Зона</td>
	  	<td>Място</td>
<<<<<<< HEAD
	  	<td>Свободно</td>
	  	<td>Заето</td>
=======
	  	<td>Заето</td>
	  	<td>Освобождаване</td>
>>>>>>> 4a020f8505deb974512d1e9c7e6e7a4d6ed5211c
	  </tr>";
	if (mysqli_num_rows($busy_place_result) > 0) {
		while($row = mysqli_fetch_assoc($busy_place_result)){
		echo '<tr><td>'.$row['zone_address'].'</td>';
		echo '<td>'.$row['place_id'].'</td>';
		echo '<td>'.$row['status_name'].'</td>';
<<<<<<< HEAD
		echo '<td>'.'<a href="update.php?id='.$row['place_id'].'">Заеми</a>'.'</td></tr>';
=======
		echo '<td>'.'<a href="update.php?id='.$row['place_id'].'">Освободи</a>'.'</td></tr>';
>>>>>>> 4a020f8505deb974512d1e9c7e6e7a4d6ed5211c
		}

	}

echo "</table>";
?>
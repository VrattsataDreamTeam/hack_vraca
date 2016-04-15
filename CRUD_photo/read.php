<?php

$conn = mysqli_connect('localhost', 'root', '', 'zones');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$read_query 	="SELECT * FROM photos JOIN zones
			 	ON photos.zone_id=zones.zone_id JOIN workers ON photos.worker_id=workers.worker_id
			 	WHERE photos.date_deleted IS NULL ";
$read_result = mysqli_query($conn, $read_query);

echo "<table border = 1>";
echo '<tr>';
		echo '<td>Служител</td>';
		echo '<td>Синя зона</td>';
		echo '<td>Снимка</td>';
		echo '<td>Дата и час на качване</td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '</tr>';
	if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){ 
		echo '<tr>';
		echo '<td>'.$row['worker_name'].'</td>';
		echo '<td>'.$row['zone_address'].'</td>';
		echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/></td>';
		echo '<td>'.$row['date'].'</td>';
		
		echo '<td><a href="update.php?id='.$row['photo_id'].'">Update</a></td>';
		echo '<td><a href="delete.php?id='.$row['photo_id'].'">Delete</a></td>';
		echo '<td><a href="img.php?id='.$row['photo_id'].'">Качи снимка</a></td>';
		echo '</tr>';
		}
	}
echo "</table>";
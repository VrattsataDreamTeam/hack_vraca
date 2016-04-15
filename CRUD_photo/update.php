<?php

$conn = mysqli_connect('localhost', 'root', '', 'zones');
// if (!$conn) {
//  	die("Connection failed: " .mysqli_connect_error());
//  	} else {
//  	echo "Connected successfully !";
//  	}
if(empty($_POST['submit'])){
	$id_photo = $_GET['id'];
//FIRST QUERY
	$q 		= "SELECT * FROM photos 
			LEFT JOIN zones ON photos.zone_id=zones.zone_id LEFT JOIN workers ON photos.worker_id=workers.worker_id 
			WHERE photos.photo_id=$id_photo";
			
	$res = mysqli_query($conn, $q);
	$row = mysqli_fetch_assoc($res);

	
	echo "<form action='update.php' method='post'>";
	echo "<input type='hidden' name='photo_id' value=".$row['photo_id'].">";
	
	echo "<p>Change the zone</p>";
	echo "<select name='zone_id'>";
	
	$q_zones 		= "SELECT * FROM zones WHERE date_deleted IS NULL";
	$res_zones 	= mysqli_query($conn, $q_zones);
	if (mysqli_num_rows($res_zones) > 0) {
		while($row_zones = mysqli_fetch_assoc($res_zones)){ 			
			echo '<option value="'.$row_zones['zone_id'].'"';
			if($row_zones['zone_id']===$row_zones['zone_id']){echo 'selected='.$row_zones['zone_id']."'";}
			echo '>'.$row_zones['zone_address'].'</option>';
		}
	}
	echo "</select>";

echo "<p>Change the worker</p>";
	echo "<select name='worker_id'>";
	
	$q_workers 		= "SELECT * FROM workers WHERE date_deleted IS NULL";
	$res_workers 	= mysqli_query($conn, $q_workers);
	if (mysqli_num_rows($res_workers) > 0) {
		while($row_workers = mysqli_fetch_assoc($res_workers)){ 			
			echo '<option value="'.$row_workers['worker_id'].'"';
			if($row_workers['worker_id']===$row_workers['worker_id']){echo 'selected='.$row_workers['worker_id']."'";}
			echo '>'.$row_workers['worker_name'].'</option>';
		}
	}
	echo "</select>";

	echo "<p><input type='submit' name='submit' value='Промени'></p>";
	echo "</form>";
}else {
	
	$id_photo			= $_POST['photo_id'];
	$id_zone 			= $_POST['zone_id'];
	$id_worker 			= $_POST['worker_id'];
	
	$update_query = "UPDATE photos 
					SET zone_id = $id_zone,
					worker_id = $id_worker			
					WHERE photo_id = $id_photo";
					
	$update_result= mysqli_query($conn, $update_query);
	if ($update_result) {
 				
		echo "Успешно променихте запис в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}
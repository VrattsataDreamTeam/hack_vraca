<?php

$conn = mysqli_connect('localhost', 'root', '', 'photos');
// if (!$conn) {
//  	die("Connection failed: " .mysqli_connect_error());
//  	} else {
//  	echo "Connected successfully !";
//  	}
if(empty($_POST['submit'])){
	$id_photo = $_GET['id'];
//FIRST QUERY
	$q 		= "SELECT * FROM photos 
			LEFT JOIN zones ON photos.id_zone=zones.id_zone 
			WHERE photos.id_photo=$id_photo";
			
	$res = mysqli_query($conn, $q);
	$row = mysqli_fetch_assoc($res);

	
	echo "<form action='update.php' method='post'>";
	echo "<input type='hidden' name='id_photo' value=".$row['id_photo'].">";
	
	echo "<p>Change the zone</p>";
	echo "<select name='id_zone'>";
	
	$q_zones 		= "SELECT * FROM zones WHERE date_deleted IS NULL";
	$res_zones 	= mysqli_query($conn, $q_zones);
	if (mysqli_num_rows($res_zones) > 0) {
		while($row_zones = mysqli_fetch_assoc($res_zones)){ 			
			echo '<option value="'.$row_zones['id_zone'].'"';
			if($row_zones['id_zone']===$row_zones['id_zone']){echo 'selected='.$row_zones['id_zone']."'";}
			echo '>'.$row_zones['zone_name'].'</option>';
		}
	}
	echo "</select>";
	echo "<p><input type='submit' name='submit' value='Промени'></p>";
	echo "</form>";
}else {
	
	$id_photo			= $_POST['id_photo'];
	$id_zone 			= $_POST['id_zone'];
	
	$update_query = "UPDATE photos 
					SET id_zone = $id_zone			
					WHERE id_photo = $id_photo";
					
	$update_result= mysqli_query($conn, $update_query);
	if ($update_result) {
 				
		echo "Успешно променихте запис в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'zones');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){

	$q 		= "SELECT * FROM zones WHERE date_deleted IS NULL";
	$res 	= mysqli_query($conn, $q);
	
	echo "<p>Избери Зона:</p>";
	echo "<form action='update.php' method='post'>";
	echo "<select name='zone_id'>";
	
	if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res)){ 
			echo '<option value="'.$row['zone_id'].'"';
			if($row['zone_address']==='--'){echo 'selected =--';}
			echo '>'.$row['zone_address'].'</option>';
		}
	}
	echo "</select>";

	
	

	echo "<p><input type='submit' name='submit' value='продължи'></p>";
	echo "</form>";
}
else{
	
	
	$id_zone 			= $_POST['zone_id'];
	
	
	$insert_query = 	"INSERT INTO photos(zone_id) 
						VALUES ('$id_zone')";
			
	$insert_result= mysqli_query($conn, $insert_query);
	if ($insert_result) {
				
		echo "Успешно добавихте запис в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
	}
}
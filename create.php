<?php 
include_once('functions/header.php');
?>
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
	echo "<form action='create.php' method='post'>";
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
	echo '<div id="worker_menu"><ol class="breadcrumb">
  <li><a href="free.php">Свободни Места</a></li>
  <li><a href="busy.php">Заети Места</a></li>
  <li><a href="img.php">Снимки</a></li>
</ol></div>';
	
	
				
		
		
	
}
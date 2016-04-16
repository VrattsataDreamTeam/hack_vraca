<?php 
include_once('header.php');
?>
<?php 
include_once('functions/header.php');
session_start();
?>
<?php
$username1=$_SESSION['username'];
$conn = mysqli_connect('localhost', 'root', '', 'zones');
mysqli_set_charset($conn, 'utf8');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){
	$q 		= "SELECT * FROM zones WHERE date_deleted IS NULL";
	$res 	= mysqli_query($conn, $q);
	
	echo "<p>Избери Зона:</p>";
	echo "<form action='free.php' method='post'>";
	echo "<select name='zone_id'>";
	
	if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res)){ 
			
			echo '<option value="'.$row['zone_id'].'"';
			if($row['zone_address']==='--'){echo 'selected =--';}
			echo '>'.$row['zone_address'].'</option>';
			$zone_id=$row['zone_id'];
			//$_SESSION['zone_id']=$row['zone_id'];
		}
	}
	echo "</select>";
	
	
	echo "<p><input type='submit' name='submit' value='продължи'></p>";
	echo "</form>";
}
else{
   $_SESSION['zone_id']=$zone_id;
	
	echo "<div id='greeting' clas='col-xs-12 col-md-12  col-sm-12'>".$username1." "."Избери Операция:</span>";
	echo '<div id="worker_menu"><ol class="breadcrumb">
  <li><a href="free.php">Свободни Места</a></li>
  <li><a href="busy.php">Заети Места</a></li>
  <li><a href="img.php">Снимки</a></li>
</ol></div>';
	
				
		
		
	
}
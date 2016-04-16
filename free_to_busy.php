<?php 
$conn = mysqli_connect('localhost', 'root', '', 'zones');

if (isset($_GET['id'])) {
	
		$place_id = $_GET['id'];	
		date_default_timezone_set('Europe/Sofia');
		$time_start = date('h:i:s');
				
			$update_place = "UPDATE `places` 
								SET `status_id`=2, 
									`time_start`='$time_start'
							WHERE `place_id`=$place_id";
					
			$update_place_result= mysqli_query($conn, $update_place);
				if ($update_place_result) {
					header('Location: busy.php');
				}
				else{
					echo "<h3>Възникна проблем!</h3>";
				}
	}
?>
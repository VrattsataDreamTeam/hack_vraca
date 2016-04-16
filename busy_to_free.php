<?php 
session_start();
$zone_id=$_SESSION['zone_id'];
$conn = mysqli_connect('localhost', 'root', '', 'zones');

if (isset($_GET['id'])) {

		$place_id = $_GET['id'];

														// Busy place go to free place 
			$update_place = "UPDATE `places` 
								SET `status_id`=1,
								`price`=0,
								`time_start`='00:00:00',
								`time_end`='00:00:00'


							WHERE `place_id`=$place_id";
					
			$update_place_result= mysqli_query($conn, $update_place);
				if ($update_place_result) {

					header('Location:free.php?zone_id='.$zone_id.'');
					
				}
				else{
					echo "<h3>Възникна проблем!</h3>";
				}
	}
?>

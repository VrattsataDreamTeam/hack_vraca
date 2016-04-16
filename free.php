<?php 
session_start();
include_once('functions/header.php');

$zone_id=$_GET['zone_id'];
$conn = mysqli_connect('localhost', 'root', '', 'zones');
$username1=$_SESSION['username'];
$worker_id=$_SESSION['worker_id'];

//echo $zone_id;
$insert_query = "INSERT INTO photos(zone_id,worker_id)
                  VALUES ('$zone_id','$worker_id')";
$insert_result= mysqli_query($conn,$insert_query);

                  	
                  
                                  


	$read_busy_place = "SELECT * FROM `places` 
							LEFT JOIN `zones`
								ON `places`.`zone_id`=`zones`.`zone_id` 
							LEFT JOIN `statuses` 
								ON `places`.`status_id`=`statuses`.`status_id` 
						WHERE `places`.`date_deleted` IS NULL AND `places`.`status_id`=1
						AND `places`.`zone_id`= $zone_id
						ORDER BY `places`.`place_id`";
	$busy_place_result = mysqli_query($conn, $read_busy_place);

echo "<div id='greeting' clas='col-xs-12 col-md-12  col-sm-12'>".$username1." "."Избери Операция:</span>";
	echo '<div id="worker_menu"><ol class="breadcrumb">
  <li><a href="free.php?zone_id='.$zone_id.'">Свободни Места</a></li>
  <li><a href="busy.php">Заети Места</a></li>
  <li><a href="read.php">Снимки</a></li>
</ol></div>';


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
$_SESSION['username']=$username1;
$_SESSION['zone_id']=$zone_id;

echo "</table>";
?>
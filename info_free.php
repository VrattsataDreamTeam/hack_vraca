<?php
include_once('functions/header.php');
echo "<div class='row'>"; 
echo "<div class='col-md-2 col-md-offset-5 col-xs-10 col-xs-offset-1'>";
echo '<p><a href="index.php" class="btn btn-primary btn-default btn-block">Назад </a></p></div></div>';

if (isset($_GET['id'])) {
$zone_id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'zones');
?>

			<br/>
<h2>Свободни места ще има в: </h2>
<div class="class='col-sm-12 col-xs-12' main" >
<?php
$read_busy 	="SELECT `time_end` FROM `places` 
				WHERE `status_id`=2 
				AND `zone_id`=$zone_id 
				ORDER BY `time_end` DESC 
				LIMIT 5";

$read_busy_result = mysqli_query($conn, $read_busy);
echo '</div>';
echo "<div class='row'>";
echo "<div class='table-responsive'>";
echo "<table style='text-align:center;' class='table'>";
echo '<tr>';
	if (mysqli_num_rows($read_busy_result) > 0) {
		while($row = mysqli_fetch_assoc($read_busy_result)){
			echo "<tr><td id='time'>". $row['time_end'] ."</td></tr>";
		}
	}

}
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</div>";
?>
	</div>
	</ul>
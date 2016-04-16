<?php
include_once('functions/header.php');
?>

<?php
include_once('functions/header.php');
?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'bluezon_zones');

		
			

$read_query 	="SELECT * FROM zones 
			 	WHERE date_deleted IS NULL ";

$read_result = mysqli_query($conn, $read_query);

	if (mysqli_num_rows($read_result) > 0) {

		$q = "SELECT COUNT(*) num, `zone_id` FROM `places` WHERE `status_id`=1 GROUP BY `zone_id`";
		$res = mysqli_query($conn, $q);
			
			
			if (mysqli_num_rows($res) > 0) 
		
	

		while($row = mysqli_fetch_assoc($read_result)){

			$row1= mysqli_fetch_assoc($res);
			//var_dump($row1);


        echo "<div class='content'>

		<section id='main' class='main'>
			<div class='col-sm-12 col-xs-12'>";
		
		//echo '<a href="free_places.php?id='.$row['zone_address'].'>
		echo '<div id="zona" class="bg-info col-sm-12 col-xs-12 col-md-4 col-md-offset-4">'.$row['zone_address']."<p>Свободни места: ".$row1['num']."</p>".'</div></a><br>';
		
		echo "</div></section></div>";
	}
		
}
?>
<!--<body>
	<div class="content">

		<section id="main" class="main">
			<div class="col-sm-12 col-xs-12">
				<button id="zona" class="btn btn-info" data-toggle="modal" data-target="#myModal">Родина Свободни: 5 места<button id="zona" class="btn btn-info" data-toggle="modal" data-target="#myModal">
					<button id="zona" class="btn btn-info">Благоев Свободни: 5 места</button><br>
						<button id="zona" class="btn btn-info">Поща Свободни: 5 места</button><br>
							<button id="zona" class="btn btn-info">Ботев Свободни: 5 места</button><br>
								<button id="zona" class="btn btn-info">Болница Свободни: 5 места</button><br>
			</div>
			<section>
	</div>
      
</body>
</html>!-->
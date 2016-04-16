<?php
include_once('functions/header.php');
?>

<?php
include_once('functions/header.php');
?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'zones');

$read_query 	="SELECT * FROM zones 
			 	WHERE date_deleted IS NULL ";

$read_result = mysqli_query($conn, $read_query);

	if (mysqli_num_rows($read_result) > 0) {
	
		while($row = mysqli_fetch_assoc($read_result)){
		
        echo "<div class='content'>

		<section id='main' class='main'>
			<div class='col-sm-12 col-xs-12'>";
		
		echo '<a href="free_places.php?id='.$row['zone_address'].'"><button id="zona" class="btn btn-info" data-toggle="modal" data-target="#myModal">'.$row['zone_address'].'</button></a><br>';
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
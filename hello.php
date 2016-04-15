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
		
        echo "<div class='row'>
		<div class='alert alert-success col-xs-4 col-md-4
		col-xs-offset-4 col-md-offset-4 text-center'>";
		
		echo '<a href="free_places.php?id='.$row['zone_address'].'">'.$row['zone_address'].'</a>';
		echo "</div></div>";
		}
}


?>
<!--<body>
	<div class="content">

		<section id="main" class="main">
			<div class="col-sm-12 col-xs-12">
				<button id="zona" class="btn btn-info" data-toggle="modal" data-target="#myModal">Родина Свободни: 5 места</button><br>
					<button id="zona" class="btn btn-info">Благоев Свободни: 5 места</button><br>
						<button id="zona" class="btn btn-info">Поща Свободни: 5 места</button><br>
							<button id="zona" class="btn btn-info">Ботев Свободни: 5 места</button><br>
								<button id="zona" class="btn btn-info">Болница Свободни: 5 места</button><br>
			</div>
			<section>
	</div>
      
</body>
</html>!-->
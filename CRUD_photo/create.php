<?php 
include_once('header.php');
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
	echo '<nav class="navbar navbar-inverse">


	<a href="free.php"><p>карта</p></span></a></li>
                                    
                                
                            
               
           </nav> ';
	
	
				
		
		echo "<p><a href='chose.php'>Read DB</a></p>";
	
}
<?php 
include_once('functions/header.php');
session_start();
?>
<?php
$username1=$_SESSION['username'];
$worker_id=$_SESSION['worker_id'];
$conn = mysqli_connect('localhost', 'root', '', 'zones');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){

	$q 		= "SELECT * FROM zones WHERE date_deleted IS NULL";
	$res 	= mysqli_query($conn, $q);
	echo '<div id="menu" class="header-menu fixed">
                <div class="container-fluid">
                        <nav role="navigation" class="col-sm-12 col-xs-12 col-md-offset-5 col-md-12">
                            <div class="navbar-header">
                              
                              <div class="nav-tabs">';
	echo "<p>$username1 Избери Зона:</p>";
	echo "<form action='free.php' method='get'>";
	echo "<select name='zone_id'>";
	
	if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res)){ 
			
			
			echo '<option value="'.$row['zone_id'].'"';
			if($row['zone_address']==='--'){echo 'selected =--';}
			echo '>'.$row['zone_address'].'</option>';
			//$zone_id=$row['zone_id'];
			//$_SESSION['zone_id']=$row['zone_id'];
		}
	}
	echo "</select>";

	
	
    //echo "<input type='hidden' name='zone_id' value=".$row['zone_id'].">";
	echo "<p><input type='submit' name='submit' value='продължи'></p>";
	echo "</form></div></div></div></div>";
}
else{
   $_SESSION['zone_id']=$zone_id;
	
	echo "<div id='greeting' clas='col-xs-12 col-md-12  col-sm-12'>".$username1." "."Избери Операция:</span>";
	echo '<div id="worker_menu"><ol class="breadcrumb">
  <li><a href="free.php">Свободни Места</a></li>
  <li><a href="busy.php">Заети Места</a></li>
  <li><a href="img.php">Снимки</a></li>";
</ol></div>';
	
				
		
		
	
}
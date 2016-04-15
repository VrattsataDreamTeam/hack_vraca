<?php 
$conn = mysqli_connect('localhost', 'root', '', 'photos');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$id_photo 	= $_GET['id'];
$date 		= date('Y-m-d');
//var_dump($id_city);
//echo $date;
$delete_query = 	"UPDATE photos 
					SET date_deleted ='$date'
					WHERE id_photo = $id_photo";
	
$delete_result = mysqli_query($conn, $delete_query);
//IT IS A GOOD PRACTICE TO BE INFORMED IF YOU HAVE DELETED OR NOT 
//YOU ALREADY KNOW ABOUT THE FOLLOWING CODE
if ($delete_result) {
 				//success code can be read db query - 
 				//you can print the entire info + your newly update db query 
		
 				//it depends on you and UI you have designed ...
 				//the same is with unseccess code
 				//IT IS A GOOD PRACTICE YOU AND USER TO KNOW EXACTLY WHAT THE RESULT IS - SUCCESS OR NOT
		echo "Успешно изтрихте запис в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешно изтриване на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}

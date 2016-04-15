
<?php
include_once('functions/header.php');
include_once('functions/functions.php');
?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'zones');
// if (!$conn) {
//  die("Connection failed: " .mysqli_connect_error());
//  } else {
//  echo "Connected successfully !";
//  }

if(empty($_POST['username1']) && empty($_POST['password1']) || empty($_POST['submit'])){

echo "<span id='form'><form action='login.php' method='post'>";

input_type('<p>','</p>','usr', 'text', 'username1', '', 'Потребителско име* ');
input_type('<p>','</p>','ps', 'password', 'password1', '', 'Парола* ');
input_type('<p>','</p>','sub', 'submit', 'submit', 'Вход', '');
echo "</span></form>";

}else{
  $username1 = $_POST['username1'];
  $password1 = $_POST['password1'];
  //$password1 = md5($password1);

$read_query =   "SELECT worker_name, password FROM workers 
                 WHERE date_deleted IS NULL";

$read_result = mysqli_query($conn, $read_query);

$a = 0;

  if (mysqli_num_rows($read_result) > 0) {
    
    while($row = mysqli_fetch_assoc($read_result)){ 
     
      if ($row['worker_name'] == $username1 && $row['password'] == $password1) {

        $a = 1;
         
        echo "<div class='col-md-offset-1'><h2>Добре дошъл $username1!</a></h2></div>";
        echo "<a class='btn btn-default col-md-offset-6 col-xs-offset-4 col-sm-offset-4'  href='CRUD_photo/create.php' role='button'>Продължи</а>";
       
      }
    } 
  }
  if ($a != 1) {
    
    echo "<h3>Грешна парола или потребителско име!</h3>";
  
  
    echo "<h3><a href='login.php'>Опитайте отново!</a></h3>";
    
  }
}
?>
</div>

<?php
//include_once('includes/footer.php');
?>
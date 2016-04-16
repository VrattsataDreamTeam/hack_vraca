
<?php
include_once('functions/header.php');
include_once('functions/functions.php');
session_start();
?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'zones');
// if (!$conn) {
//  die("Connection failed: " .mysqli_connect_error());
//  } else {
//  echo "Connected successfully !";
//  }

if(empty($_POST['username1']) && empty($_POST['password1']) || empty($_POST['submit'])){
echo '<div id="menu" class="header-menu fixed">
                <div class="container-fluid">
                        <nav role="navigation" class="col-sm-12 col-xs-12 col-md-offset-5 col-md-12">
                            <div class="navbar-header">
                              
                              <div class="nav-tabs">'; 
echo "<span id='form'><form action='login.php' method='post'>";

input_type('<p>','</p>','usr', 'text', 'username1', '', 'Потребителско име* ');
input_type('<p>','</p>','ps', 'password', 'password1', '', 'Парола* ');
input_type('<p>','</p>','sub', 'submit', 'submit', 'Вход', '');
echo "</span></form></div></div></div></div>";

}else{
  $username1 = $_POST['username1'];
  $password1 = $_POST['password1'];
  //$password1 = md5($password1);

$read_query =   "SELECT worker_id,worker_name, password FROM workers 
                 WHERE date_deleted IS NULL";

$read_result = mysqli_query($conn, $read_query);

$a = 0;

  if (mysqli_num_rows($read_result) > 0) {
    
    while($row = mysqli_fetch_assoc($read_result)){ 
     
      if ($row['worker_name'] == $username1 && $row['password'] == $password1 ) {

        $a = 1;
        $_SESSION['worker_id']=$row['worker_id'];
        echo "<div class='col-md-offset-0'><h2>Добре дошъл $username1!</a></h2></div>";
        
        echo "<a class='btn btn-default col-md-4 col-md-offset-4 col-xs-offset-4 col-sm-offset-4'  href='create.php' role='button'>Продължи</а>";
       $_SESSION['username']=$username1;
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
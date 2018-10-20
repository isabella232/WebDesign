<?php // register.php
session_start();

include "dbconnect.php";
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty ($_POST['password'])
		|| empty ($_POST['password2']) ) {
	echo "All records to be filled in";
	exit;}
	}
$name1 = $_POST['name1'];
$name2 = $_POST['name2'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$username=$name1.' '.$name2;
// echo ("$username" . "<br />". "$password2" . "<br />");
if ($password != $password2) {
	echo "Sorry passwords do not match";
	exit;
	}

$query = 'select * from users '
         ."where email='$email' ";
// echo "<br>" .$query. "<br>";
$result = $dbcnx->query($query);
if ($result->num_rows >0 )
{
  // if they are in the database register the user id
    $_SESSION['registered'] = 1;
  	echo "The email has been registered!";
}

else {
  $password = md5($password);
  // echo $password;
  $sql = "INSERT INTO users (username, email, password)
  		VALUES ('$username', '$email', '$password')";
  //	echo "<br>". $sql. "<br>";
  $result = $dbcnx->query($sql);

  if (!$result)
  	echo "Your query failed.";
  else
  {
    	echo "Welcome ". $username . ". You are now registered";
      $_SESSION['success_register']=1;
      $_SESSION['email_reg'] = $email;
  }
}
header('Location: login.php');
?>

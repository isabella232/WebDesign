<?php
  session_start();
  include "dbconnect.php";
  var_dump($_SESSION);
  var_dump($_POST);
  $review = $_POST['ReviewContent'];
  $rate_clean = $_POST['Cleanliness'];
  $rate_comfo = $_POST['Comfort'];
  $rate_locat = $_POST['Location'];
  $username = $_SESSION['valid_user'];
  $hotel = $_SESSION['hotel'];
  $sql = "INSERT INTO reviews (username, hotel, review, cleanliness, comfort, location)
          VALUES ('$username', '$hotel', '$review', '$rate_clean','$rate_comfo', '$rate_locat')";
  	echo "<br>". $sql. "<br>";

  $result = $dbcnx->query($sql);
?>

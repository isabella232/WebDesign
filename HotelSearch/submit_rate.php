<?php
  session_start();
  include "dbconnect.php";
  $_SESSION["operation"] = "rate";
  var_dump($_SESSION);
  var_dump($_POST);
  $review = $_POST['ReviewContent'];
  $rate_clean = $_POST['Cleanliness'];
  $rate_comfo = $_POST['Comfort'];
  $rate_locat = $_POST['Location'];
  $booking_id = $_POST['booking_id'];
  $hotel = $_POST['hotel'];
  $overall = ($rate_clean+$rate_comfo+$rate_locat)/3;
  $query = "INSERT INTO `reviews`(`review`, `cleanliness`, `comfort`, `location`, `overall`, `booking_id`)
          VALUES ('$review', '$rate_clean','$rate_comfo', '$rate_locat','$overall', '$booking_id')";

  $result = $dbcnx->query($query);

  $query = "SELECT * FROM hotel_search WHERE hotelname  LIKE '$hotel'";
  $result = mysqli_query($dbcnx,$query);
  $row = $result->fetch_assoc();
  $new_avg = ($row['review_score']*$row['number_of_review'] + $overall) /($row['number_of_review']+1);
  $new_number_of_review = $row['number_of_review']+1;

  $query = "UPDATE `hotel_search` SET `number_of_review`='$new_number_of_review',`review_score`='$new_avg' WHERE `hotelname` = '$hotel' ";
  $result = mysqli_query($dbcnx,$query);
    	echo "<br>". $query. "<br>";
  $query = "UPDATE `trips` SET `reviewed`='1' WHERE `id` LIKE '$booking_id' ";
  $result = mysqli_query($dbcnx,$query);
    	echo "<br>". $query. "<br>";
  header('Location: trips.php');
?>

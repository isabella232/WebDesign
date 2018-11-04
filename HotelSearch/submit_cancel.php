<?php
  session_start();
  include "dbconnect.php";
  $_SESSION["operation"] = "cancel";
  var_dump($_POST);
  $booking_id = $_POST['booking_id'];
  $sql = "DELETE FROM `trips` WHERE id = '$booking_id' ";
  $result = $dbcnx->query($sql);
  header('Location: trips.php');
?>

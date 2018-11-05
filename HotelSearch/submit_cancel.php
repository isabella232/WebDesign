<?php
  session_start();
  include "dbconnect.php";
  $_SESSION["operation"] = "cancel";
  var_dump($_POST);
  $booking_id = $_POST['booking_id'];
  $sql = "DELETE FROM `trips` WHERE id = '$booking_id' ";
  $result = $dbcnx->query($sql);

  $to = "root@localhost";
  $subject = "Cancel Confirmation";
  $message = "Your booking '$hash' has been cancelled. ";
  $headers = 'From: root@localhost'.'\r\n'.'Reply-To:root@localhost'.'\r\n'.'x-Mailer:PHP/'.phpversion();
  mail($to, $subject,$message, $headers,'-froot@localhost');
  echo ("mail sent to:".$to);

  header('Location: trips.php');
?>

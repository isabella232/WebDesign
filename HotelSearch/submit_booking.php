<?php
  session_start();
  include "dbconnect.php";
  var_dump($_POST);
  $_SESSION["operation"] = "book";
  $single = $_POST['single'];
  $double = $_POST['double'];
  $user = $_POST['user'];
  $hotel = $_POST['hotel'];
  $check_in_date = $_POST['check_in_date'];
  $check_out_date = $_POST['check_out_date'];
  $people_count = $_POST['people_count'];
  $single_price = $_POST['single_price'];
  $double_price = $_POST['double_price'];
  $total_price = $_POST['total_price'];
  $hash = bin2hex(random_bytes(3));
  $sql = "INSERT INTO `trips`(`username`, `hotel`, `check_in`, `check_out`, `people`, `total_price`, `id`, `single_price`, `double_price`,`single_cnt`,`double_cnt`)
          VALUES ('$user', '$hotel', '$check_in_date', '$check_out_date','$people_count', '$total_price','$hash','$single_price', '$double_price', '$single', '$double')";

  $result = $dbcnx->query($sql);

  $to = "root@localhost";
  $subject = "Booking Confirmation";
  $message = "Your booking is successful! Confirmation code is '$hash'. ";
  $headers = 'From: root@localhost'.'\r\n'.'Reply-To:root@localhost'.'\r\n'.'x-Mailer:PHP/'.phpversion();
  mail($to, $subject,$message, $headers,'-froot@localhost');
  echo ("mail sent to:".$to);

  header('Location: trips.php');
?>

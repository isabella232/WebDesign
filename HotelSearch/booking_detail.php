<?php
include "dbconnect.php";
session_start();
$booking_id= $_GET['booking_id'];
$query = "SELECT * FROM trips LEFT JOIN hotel_search ON trips.hotel= hotel_search.hotelname WHERE id  LIKE '$booking_id'";
$result = mysqli_query($dbcnx,$query);
$row = $result->fetch_assoc();
$single = $row['single_cnt'];
$double = $row['double_cnt'];
$user = $row['username'];
$specific_hotel = $row['hotel'];
$check_in_date = $row['check_in'];
$check_out_date = $row['check_out'];
$people_count = $row['people'];
$single_price = $row['single_price'];
$double_price = $row['single_price'];
$total_price = $row['total_price'];
$period = (int)date_diff(date_create($check_in_date), date_create($check_out_date))->format("%R%a");
$result = mysqli_query($dbcnx,"SELECT * FROM hotel_search WHERE hotelname  LIKE '%$specific_hotel%'");
$hotel_info = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Hotel Search Portal</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<section class="short_color hero">
			<header>
				<div class="wrapper">
					<a href="index.php"><img src="img/letter-s.png" class="logo" alt="" title=""/></a>
					<nav>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="trips.php">Trips</a></li>
							<li><a href="help.php">Help</a></li>
							<?php
							if (isset($_SESSION['valid_user']))
							{
							?>
							<li><a href="#">
								<b>
								<?php echo $_SESSION['valid_user']  ?>
								</b>
							</a></li>
							<li><a href="logout.php">Log out</a></li>
							<?php }
							else{
							?>
							<li><a href="login.php?type=log_in">Login</a></li>
							<li><a href="login.php?type=sign_up">Sign up</a></li>
							<?php }
							?>
						</ul>
					</nav>
				</div>
			</header><!--  end header section  -->
		</section><!--  end hero section  -->

	   <div class="wrapper">
					<!-- left column shows user's recent stay -->
			  <div id="leftcolumn">
					<div class="card">
						<div class="content">
				      <h2><?php echo $hotel_info['hotelname'];  ?></h2>
							<img src="<?php echo "img/".$hotel_info['pic_link'];  ?> " alt="" title="" class="rate_hotel"/>
							<h4><?php echo $hotel_info['address']; ?></h4>
						</div>
					</div>
				</div>
		  <!-- right column is comment section -->
			<div id="rightcolumn">
				<div class="card">
					<div class="content">
						<h2> Trip details</h2>
						<h4>Confirmation Code: <?php echo $booking_id ?></h4>
						<h4>Full Name: <?php echo $_SESSION['valid_user'] ?></h4>
						<h4>Email: <?php echo $_SESSION['valid_email'] ?></h4>
						<h4>Check In Date: <?php echo $check_in_date ?></h4>
						<h4>Check Out Date: <?php echo $check_out_date ?> </h4>
						<h4>Guests: <?php echo $people_count ?></h4>
						<hr>
						<h2>Payment</h2>
						<form action="submit_booking.php" method="post">
							<table>
								<tr><th>Room</th><th>Quantity</th><th>Price per night</th><th>Stay</th><th>Subtotal</th></tr>
							<?php
							if($single!=0)
							{
								?>
								<tr>
									<td>Single room</td>
									<td><?php echo $single?></td>
									<td>$<?php echo $single*$single_price ?></td>
									<td><?php echo $period ?></td>
									<td>$<?php echo $single*$single_price*$period ?></td>
								</tr>
								<?php
							}
							if($double!=0)
							{
								?>
								<tr>
									<td>Double room</td>
									<td><?php echo $double?></td>
									<td><?php echo $double*$double_price ?></td>
									<td><?php echo $period ?></td>
									<td><?php echo $double*$double_price*$period ?></td>
								</tr>
								<?php
							}
							 ?>
							 <tr><td colspan="5">Total Price: <b>$<?php echo $total_price  ?></b></td></tr>
						 </table>
							 <input type="text" name="hotel" value ='<?php echo $specific_hotel ?>' hidden>
							 <input type="text" name="user" value ='<?php echo $user ?>' hidden>
							 <input type="text" name="single" value ='<?php echo $single ?>' hidden>
							 <input type="text" name="double" value ='<?php echo $double ?>' hidden>
							 <input type="text" name="check_in_date" value ='<?php echo $check_in_date ?>' hidden>
							 <input type="text" name="check_out_date" value ='<?php echo $check_out_date ?>' hidden>
							 <input type="text" name="people_count" value ='<?php echo $people_count ?>' hidden>
							 <input type="text" name="single_price" value ='<?php echo $single_price ?>' hidden>
							 <input type="text" name="double_price" value ='<?php echo $double_price ?>' hidden>
							 <input type="text" name="total_price" value ='<?php echo $total_price ?>' hidden>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>

	<footer>
		Copyright &copy; 2018 Hotel Search Portal
	  <br>
	  <a href="mailto:ren@jiawei.com">ren@jiawei.com</a> <a href="mailto:shaun@yong.com">shaun@yong.com</a>
	</footer>

</html>

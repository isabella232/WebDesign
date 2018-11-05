<?php
session_start();
include "dbconnect.php";
if(!isset($_SESSION['valid_user']))
{
	$_SESSION['redirect'] = "Location: trips.php";
	header('Location: login.php');
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hotel Search Portal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<section class="short_background hero">
		<header>
			<div class="wrapper">
				<a href="index.php"><img src="img/letter-s.png" height="50px" width="50px" class="logo" alt="" title=""/></a>
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
						<li><a href="login.php?type=sign_up">Sign Up</a></li>
						<?php }
						?>
					</ul>
				</nav>
			</div>
		</header><!--  end header section  -->

		<section class="caption">
      <h2 class="caption">Trips</h2>

    </section>
	</section><!--  end hero section  -->

  <section class="triplistings">
    <div class="wrapper">
			<?php
			if(isset($_SESSION["operation"]))
			{
				?>
				<div class="card">
					<div class="content">
						<?php
						if($_SESSION["operation"] == "book")
						{
							?>
							<h2 style="text-align:center;"> New Booking Confirmed!!</h2>
							<h3 style="text-align:center;"> We have dropped you an email. Check your trip out in Upcoming Trips.</h3>
							<?php
						}
						if($_SESSION["operation"] == "cancel")
						{
							?>
							<h2 style="text-align:center;"> Booking Has Been Cancelled</h2>
							<h3 style="text-align:center;"> We have dropped you an email.</h3>
							<?php
						}
						if($_SESSION["operation"] == "rate")
						{
							?>
							<h2 style="text-align:center;"> Thanks For Rating!!</h2>
							<?php
						}
						unset($_SESSION["operation"]);
						?>
					</div>
				</div>
						<?php
			}
			 ?>
			 <div class="card">
				 <div class="content">
					<h2 style="text-align:center;">Upcoming Trips</h2>

					<ul class="trips_list">
					<?php
					$today= new DateTime('today');
					$today =$today->format('Y-m-d');
					$user = $_SESSION['valid_user'];
					$query = "SELECT * FROM trips LEFT JOIN hotel_search ON trips.hotel= hotel_search.hotelname WHERE username  LIKE '%$user%' AND check_in >='$today'";
					 $result = mysqli_query($dbcnx,$query);
					 while ($row = $result->fetch_assoc()) {
					 ?>
		        <li>
		          <a href="booking_detail.php?booking_id=<?php echo $row['id'];?>">
		            <img src="img/<?php echo $row['pic_link'] ?>" alt="" title="" class="property_img"/>
		          </a>
		          <div class="trip_details">
		            <h1>
		              <a href="#"><?php echo $row['hotel'] ?></a>
		            </h1>
		            <h1>
		              <?php echo $row['check_in'] ?> to <?php echo $row['check_out'] ?> | <?php echo $row['people'] ?> guests
		            </h1>
		            <h1>
		              <a href="confirm_cancel.php?booking_id=<?php echo $row['id'];?>">Cancle</a>
		            </h1>
		          </div>
		        </li>
					<?php } ?>


		      </ul>
				</div>
			</div>
			<div class="card">
				<div class="content">
		      <h2 style="text-align:center;">Past Trips</h2>
		      <ul class="trips_list">
						<?php
						$today= new DateTime('today');
						$today =$today->format('Y-m-d');
						$user = $_SESSION['valid_user'];
						$query = "SELECT * FROM trips LEFT JOIN hotel_search ON trips.hotel= hotel_search.hotelname WHERE username  LIKE '%$user%' AND check_in <'$today'";
						 $result = mysqli_query($dbcnx,$query);
						 while ($row = $result->fetch_assoc()) {
						 ?>
			        <li>
			          <a href="booking_detail.php?booking_id=<?php echo $row['id']; ?>">
			            <img src="img/<?php echo $row['pic_link'] ?>" alt="" title="" class="property_img"/>
			          </a>
			          <div class="trip_details">
			            <h1>
			              <a href="#"><?php echo $row['hotel'] ?></a>
			            </h1>
			            <h1>
			              <?php echo $row['check_in'] ?> to <?php echo $row['check_out'] ?> | <?php echo $row['people'] ?> guests
			            </h1>
			            <h1>
										<?php if($row['reviewed'] == 0){ ?>
			              <a href="rate.php?booking_id=<?php echo $row['id']; ?>">Go to Rate</a>
									<?php } else echo "Rated"?>
			            </h1>
			          </div>
			        </li>
						<?php } ?>
		      </ul>
				</div>
			</div>
    </div>
  </section>
</body>
<footer>
	Copyright &copy; 2018 Hotel Search Portal
	<br>
	<a href="mailto:ren@jiawei.com">ren@jiawei.com</a> <a href="mailto:shaun@yong.com">shaun@yong.com</a>
</footer>
</html>
<?php
}
?>

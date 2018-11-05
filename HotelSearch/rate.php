<?php
include "dbconnect.php";
session_start();
$booking_id= $_GET['booking_id'];
$query = "SELECT * FROM trips LEFT JOIN hotel_search ON trips.hotel= hotel_search.hotelname WHERE id  LIKE '$booking_id'";
$result = mysqli_query($dbcnx,$query);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hotel Search Portal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/main.js"></script>
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
					<h2>Rate & Review</h2>
					<a href="#">
						<img src="img/<?php echo $row['pic_link'] ?>" alt="" title="" class="rate_hotel"/>
					</a>
					<h3>Marinabay Sand</h3>
					<h3> <?php echo $row['check_in'] ?> </br>to </br><?php echo $row['check_out'] ?></h3>
				</div>
			</div>
		</div>
		<!-- right column is comment section -->
		<div id="rightcolumn">
			<div class="card">
				<div class="content">
					<form action="submit_rate.php" method="post">
						<input type = "text" value = "<?php echo $booking_id ?>" name = "booking_id" hidden/>
						<input type = "text" value = "<?php echo $row['hotelname'] ?>" name = "hotel" hidden/>
						<section class="review">
							<h2>Describe your experience</h2>
							<textarea name="ReviewContent" id="review" cols="40" rows="5" placeholder="How do you feel about this trip?" autocomplete="off"></textarea>

							<h2>Cleanliness</h2>
							<div class="rate">
						    <input type="radio" id="1star5" name="Cleanliness" value="5" />
						    <label for="1star5" title="text">5 stars</label>
						    <input type="radio" id="1star4" name="Cleanliness" value="4" />
						    <label for="1star4" title="text">4 stars</label>
						    <input type="radio" id="1star3" name="Cleanliness" value="3" />
						    <label for="1star3" title="text">3 stars</label>
						    <input type="radio" id="1star2" name="Cleanliness" value="2" />
						    <label for="1star2" title="text">2 stars</label>
						    <input type="radio" id="1star1" name="Cleanliness" value="1" />
						    <label for="1star1" title="text">1 star</label>
						  </div>


							<h2>Comfort</h2>
							<div class="rate">
						    <input type="radio" id="2star5" name="Comfort" value="5" />
						    <label for="2star5" title="text">5 stars</label>
						    <input type="radio" id="2star4" name="Comfort" value="4" />
						    <label for="2star4" title="text">4 stars</label>
						    <input type="radio" id="2star3" name="Comfort" value="3" />
						    <label for="2star3" title="text">3 stars</label>
						    <input type="radio" id="2star2" name="Comfort" value="2" />
						    <label for="2star2" title="text">2 stars</label>
						    <input type="radio" id="2star1" name="Comfort" value="1" />
						    <label for="2star1" title="text">1 star</label>
						  </div>


							<h2>Location</h2>
							<div class="rate">
						    <input type="radio" id="3star5" name="Location" value="5" />
						    <label for="3star5" title="text">5 stars</label>
						    <input type="radio" id="3star4" name="Location" value="4" />
						    <label for="3star4" title="text">4 stars</label>
						    <input type="radio" id="3star3" name="Location" value="3" />
						    <label for="3star3" title="text">3 stars</label>
						    <input type="radio" id="3star2" name="Location" value="2" />
						    <label for="3star2" title="text">2 stars</label>
						    <input type="radio" id="3star1" name="Location" value="1" />
						    <label for="3star1" title="text">1 star</label>
						  </div>

						</section>
						<input type="submit" value="Submit" class="button"></input>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<foot>
		<footer>
			Copyright &copy; 2018 Hotel Search Portal
		  <br>
		  <a href="mailto:ren@jiawei.com">ren@jiawei.com</a> <a href="mailto:shaun@yong.com">shaun@yong.com</a>
		</footer>
	</foot>

</body>
</html>

<!DOCTYPE html>
<?php
// if(isset($_SESSION['success_register']))
// {
// 	  $email = $_SESSION['email_reg'];
// 	  $query = 'select * from users '
// 	           ."where email='$email' ";
// 	// echo "<br>" .$query. "<br>";
// 	  $result = $dbcnx->query($query);
// 	  if ($result->num_rows >0 )
// 	  {
// 	    // if they are in the database register the user id
// 			$user =  $result->fetch_assoc();
// 	    $_SESSION['valid_user'] = $user['username'];
// 	  }
// 	  $dbcnx->close();
// }

@ $db = new mysqli('localhost' , 'root', '', 'user_management');
  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $result = mysqli_query($db,"select location, hotelname,pic_link from hotel_search");
  if ($result) {
      echo  " prices are updated";
  } else {
  	  echo "An error has occurred.  The item was not added.";
  }

  $check_in_date = $_POST['check_in_date'];
  $check_out_date = $_POST['check_out_date'];
  $max_price = $_POST['max_price'];
  $min_price = $_POST['min_price'];
  $star_rating = $_POST['star_ratings'];
?>
<html lang="en">
<head>
	<title>Hotel Search Portal</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<!-- <meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" /> -->

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<section class="hero">
		<header>
			<div class="wrapper">
				<a href="#"><img src="" height="50px" width="50px" class="logo" alt="" title=""/></a>
				<a href="#" class="hamburger"></a>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Rate</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
					<a href="#" class="login_btn">Login</a>
					<a href="#" class="login_btn">Register</a>
				</nav>
			</div>
		</header><!--  end header section  -->

			<section class="caption">
				<h2 class="caption">Find Your Dream Hotel</h2>
				<h3 class="properties">Hotels</h3>
			</section>
	</section>
	<section class="search">
		<div class="wrapper">
			<form action="results.php" method="post">
				<input type="text" id="search" name="search" placeholder="What are you looking for?"  autocomplete="off"/>
				<input type="submit" id="submit_search" name="submit_search"/>
			</form>
			<a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
		</div>


     <div class="advanced_search">
			<div class="wrapper">
				<span class="arrow"></span>
				<form action="#" method="post">
					<div class="search_fields">
						<input type="date" class="float" id="check_in_date" name="check_in_date" placeholder="Check In Date"  autocomplete="off">

						<hr class="field_sep float"/>

						<input type="date" class="float" id="check_out_date" name="check_out_date" placeholder="Check Out Date"  autocomplete="off">
					</div>
					<div class="search_fields">
						<input type="text" class="float" id="min_price" name="min_price" placeholder="Min. Price"  autocomplete="off">

						<hr class="field_sep float"/>

						<input type="text" class="float" id="max_price" name="max_price" placeholder="Max. price"  autocomplete="off">
					</div>
					<input type="text" id="keywords" name="keywords" placeholder="Star Ratings"  autocomplete="off">
					<input type="submit" id="submit_search" name="submit_search"/>
				</form>
			</div>
		</div>	 </section>


	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
	  <?php  $result = mysqli_query($db,"SELECT pic_link, price, hotelname, star_ratings FROM hotel_search");
			 $num_results = $result->num_rows;
			//  for ($i=0; $i <$num_results; $i++) {
			// 	$row = $result->fetch_assoc();
			while ($row = $result->fetch_assoc()) {
                if (($min_price <= $row['price'] && $max_price >= $row['price'] ) && ($star_rating == $row['star_ratings'] ) ) {
	         ?>
				<li>
					<a href="#">
						<img src="<?php echo "img/".$row['pic_link']; ?> " alt="" title="" class="property_img"/>
					</a>
					<span class="price"><?php echo $row['price'] ?></span>
					<div class="property_details">
						<h1>
                            <a href="#"><?php echo $row['hotelname']; ?></a>
                            <p>Check-In: <?php echo $check_in_date; ?></p>
                            <p>Check-Out: <?php echo $check_out_date; ?></p>
						</h1>
						<h2> <span class="property_size"><?php echo $row['star_ratings']." stars"; ?></span></h2>
					</div>
	          </li>  <?php            }               }   ?>
				<!-- <li>
					<a href="#">
						<img src="img/HolidayInn.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$233</span>
					<div class="property_details">
						<h1>
							<a href="#">HolidayInn</a>
						</h1>
						<h2> <span class="property_size">4 stars</span></h2>
					</div>
				</li>

				<li>
					<a href="#">
						<img src="img/Marinabay.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$585</span>
					<div class="property_details">
						<h1>
							<a href="#">Marina Bay Sands</a>
						</h1>
						<h2>
							<span class="property_size">5 stars</span></h2>
					</div>
				</li>

				<li>
					<a href="#">
						<img src="img/PanPacific.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$486</span>
					<div class="property_details">
						<h1>
							<a href="#">Pan Pacific Hotel Singapore</a>
						</h1>
						<h2>
							<span class="property_size">5 stars</span></h2>
					</div>
				</li>

				<li>
					<a href="#">
						<img src="img/RitzCarlton.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$795</span>
					<div class="property_details">
						<h1>
							<a href="#">Ritz Carlton</a>
						</h1>
						<h2> <span class="property_size">5 stars</span></h2>
					</div>
				</li>

				<li>
					<a href="#">
						<img src="img/HotelJen.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$336</span>
					<div class="property_details">
						<h1>
							<a href="#">Hotel Jen Orchard Gateway Singapore</a>
						</h1>
						<h2><span class="property_size">4 stars</span></h2>
					</div>
				</li> -->

				<!-- <li>
					<a href="#">
						<img src="img/HotelCarlton.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$310</span>
					<div class="property_details">
						<h1>
							<a href="#">Carlton Hotel</a>
						</h1>
						<h2><span class="property_size">5 stars</span></h2>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="img/MandarinOriental.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$609</span>
					<div class="property_details">
						<h1>
							<a href="#">Mandarin Oriental</a>
						</h1>
						<h2><span class="property_size">4 stars</span></h2>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="img/SwissotelMerchantHotel.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$239</span>
					<div class="property_details">
						<h1>
							<a href="#">Swissotel Merchant Hotel</a>
						</h1>
						<h2><span class="property_size">4 stars</span></h2>
					</div>
				</li> -->
			</ul>
			<div class="more_listing">
				<a href="#" class="more_listing_btn">View More Listings</a>
			</div>
		</div>
	</section>	<!--  end listing section  -->


</body>
</html>

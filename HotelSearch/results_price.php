<!DOCTYPE html>
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
	</section><!--  end hero section  -->
<?php
  
  // create short variable names
  $check_in_date =$_POST['check_in_date'];
  $check_out_date =$_POST['check_out_date'];
  $min_price = $_POST['min_price'];
  $max_price = $_POST['max_price'];
  $star_ratings = $_POST['star_ratings'];
  $no_of_days = date_diff($check_in_date,$check_out_date)
  if (!$check_in_date || !$check_out_date || $min_price || $max_price || $star_ratings ) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

?> 




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
		</div><!--  end advanced search section  -->
	</section><!--  end search section  -->


	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
           
				<li>
					<a href="#">
						<img src="img/bencoolen.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price"><?php $total_price = 115 * $no_of_days; echo "$" ."${total_price}";?> </span>
					<div class="property_details">
						<h1>
							<a href="#">Bencoolen Hotel</a>
						</h1>
						<h2> <span class="property_size">3 stars</span></h2>
					</div>
	 </li> 
				<li>
					<a href="#">
						<img src="img/HolidayInn.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price"><?php $total_price = 233 * $no_of_days; echo "$" ."${total_price}";?></span>
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
					<span class="price"><?php $total_price = 585 * $no_of_days; echo "$" ."${total_price}";?></span>
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
					<span class="price"><?php $total_price = 486 * $no_of_days; echo "$" ."${total_price}";?></span>
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
					<span class="price"><?php $total_price = 795 * $no_of_days; echo "$" ."${total_price}";?></span>
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
					<span class="price"><?php $total_price = 336 * $no_of_days; echo "$" ."${total_price}";?></span>
					<div class="property_details">
						<h1>
							<a href="#">Hotel Jen Orchard Gateway Singapore</a>
						</h1>
						<h2><span class="property_size">4 stars</span></h2>
					</div>
				</li>
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

	<footer>
		<div class="wrapper footer">
			<ul>
				<li class="links">
					<ul>
						<li><a href="#">About</a></li>
						<li><a href="#">Support</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Policy</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</li>

				<li class="links">
					<ul>
						<li><a href="#">Appartements</a></li>
						<li><a href="#">Houses</a></li>
						<li><a href="#">Villas</a></li>
						<li><a href="#">Mansions</a></li>
						<li><a href="#">...</a></li>
					</ul>
				</li>

				<li class="links">
					<ul>
						<li><a href="#">New York</a></li>
						<li><a href="#">Los Anglos</a></li>
						<li><a href="#">Miami</a></li>
						<li><a href="#">Washington</a></li>
						<li><a href="#">...</a></li>
					</ul>
				</li>

				<li class="about">
					<p>La Casa is real estate minimal html5 website template, designed and coded by pixelhint, tellus varius, dictum erat vel, maximus tellus. Sed vitae auctor ipsum</p>
					<ul>
						<li><a href="http://facebook.com/pixelhint" class="facebook" target="_blank"></a></li>
						<li><a href="http://twitter.com/pixelhint" class="twitter" target="_blank"></a></li>
						<li><a href="http://plus.google.com/+Pixelhint" class="google" target="_blank"></a></li>
						<li><a href="#" class="skype"></a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="copyrights wrapper">
			Copyright © 2015 <a href="http://pixelhint.com" target="_blank" class="ph_link" title="Download more free Templates">Pixelhint.com</a>. All Rights Reserved.
		</div>
	</footer><!--  end footer  -->
	
</body>
</html>
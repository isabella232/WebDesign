<!DOCTYPE html>
<html lang="en">
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

  $result = mysqli_query($db,"select location, hotelname from hotel_search");
  $num_results = $result->num_rows;
//   echo "<p>Number of products found " . $num_results;
  $product = [];
  $sales = [];

//   print_r( $product);

while ($row = $result->fetch_assoc()) {
    $product[] = $row['location'];
    $sales[] = $row['hotelname'];
}
print_r($product);
  if ($result) {
      echo  " prices are updated";
  } else {
  	  echo "An error has occurred.  The item was not added.";
  }

  $db->close();







?>

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
						<li><a href="trips.php">Trips</a></li>
						<li><a href="help.php">Help</a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="">Sign Up</a></li>
					</ul>
				</nav>
			</div>
		</header><!--  end header section  -->

			<section class="caption">
				<h2 class="caption">Find Your Dream Hotel</h2>
				<h3 class="properties">Hotels</h3>
			</section>
	</section><!--  end hero section  -->

	<section class="search">
		 <div class="wrapper">
			<form action="results.php" method="post">
			<input type="text" id="search" name="search" placeholder="Search By Location"  autocomplete="off"/>
				<input type="submit" id="submit_search" name="submit_search"/>
			</form>
			<a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
		</div>
	 
    <div class="advanced_search">
			<div class="wrapper">
				<span class="arrow"></span>
				<form action="specific_price.php" method="post">
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
					<input type="text" id="keywords" name="star_ratings" placeholder="Star Ratings"  autocomplete="off">
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
					<span class="price">$115</span>
					<div class="property_details">
						<h1><form name="bencoolen"  >
								<input type="hidden" id="hotel_name" name="hotel_name" value="Bencoolen" /> 
								<a href="specific_hotel.php?hotel_name=Bencoolen" onclick="this.form.submit();">Bencoolen Hotel</a>
                            </form>
							<!-- <a href="specific_hotel.php"  onclick="document.getElementById('myform').submit();">Bencoolen Hotel</a> -->
						</h1>
						<h2> <span class="property_size">3 stars</span></h2>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="img/HolidayInn.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$233</span>
					<div class="property_details">
						<h1>
						<form name="HolidayInn"  >
								<input type="hidden" id="hotel_name" name="hotel_name" value="HolidayInn" /> 
								<a href="specific_hotel.php?hotel_name=HolidayInn" onclick="this.form.submit();">Holiday Inn</a>
                            </form>
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
						<form name="MarinaBay"  >
								<input type="hidden" id="hotel_name" name="hotel_name" value="MarinaBay" /> 
								<a href="specific_hotel.php?hotel_name=Marina Bay" onclick="this.form.submit();">Marina Bay</a>
                            </form>
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
						<form name="PanPacific"  >
								<input type="hidden" id="hotel_name" name="hotel_name" value="Pan Pacific" /> 
								<a href="specific_hotel.php?hotel_name=PanPacific" onclick="this.form.submit();">Pan Pacific</a>
                            </form>
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
						<form name="RitzCarlton"  >
								<input type="hidden" id="hotel_name" name="hotel_name" value="Ritz Carlton" /> 
								<a href="specific_hotel.php?hotel_name=Ritz Carlton" onclick="this.form.submit();">Ritz Carlton</a>
                            </form>
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
						<form name="HotelJen"  >
								<input type="hidden" id="hotel_name" name="hotel_name" value="Hotel Jen" /> 
								<a href="specific_hotel.php?hotel_name=Hotel Jen" onclick="this.form.submit();">Hotel Jen Orchard Gateway</a>
                            </form>
						</h1>
						<h2><span class="property_size">4 stars</span></h2>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="img/HotelCarlton.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$310</span>
					<div class="property_details">
						<h1>
						<form name="CarltonHotel"  >
								<input type="hidden" id="hotel_name" name="hotel_name" value="Carlton Hotel" /> 
								<a href="specific_hotel.php?hotel_name=Carlton Hotel" onclick="this.form.submit();">Carlton Hotel</a>
                            </form>
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
						<form name="Mandarin Oriental"  >
								<input type="hidden" id="hotel_name" name="hotel_name" value="Mandarin Oriental" /> 
								<a href="specific_hotel.php?hotel_name=Mandarin Oriental" onclick="this.form.submit();">Mandarin Oriental</a>
                            </form>
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
						<form name="Swissotel Merchant Hotel"  >
								<input type="hidden" id="hotel_name" name="hotel_name" value="Swissotel Merchant Hotel" /> 
								<a href="specific_hotel.php?hotel_name=Swissotel Merchant Hotel" onclick="this.form.submit();">Swissotel Merchant Hotel</a>
                            </form>
						</h1>
						<h2><span class="property_size">4 stars</span></h2>
					</div>
				</li>
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
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
	<meta name="author" content="pixelhint.com">
	<!-- <meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" /> -->
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
  <style>
	#leftcolumn { float: left;
		          width: 200px;
							padding-top: 50px;
							padding-bottom: 60px;
	}
	#rightcolumn { margin-left: 200px;
		padding-top: 50px;
		padding-bottom: 60px;
	}

	/*  Hero Section  */

	.newhero{
	    width: 100%;
	    height: 100px;
	    position: relative;
			background-color: #95badf;
	    /* background: url('../img/hotel_background.jpg'); */
	    /* background-size: cover;
	    -webkit-background-size: cover;
	    -moz-background-size: cover;
	    -o-background-size: cover; */
	}

	.newhero .caption{
	    width: 100%;
	    position: absolute;
	    text-align: center;
	    top: 50%;
	    margin-top: -105px;
	}

	.newhero .caption h2{
	    color: #fff;
	    font-family: "P22 Corinthia";
	    font-size: 100px;
	    font-weight: lighter;
	    margin: 0;
	    position: relative;
	    display: block;
	}

	.newhero .caption h3{
	    color: #fff;
	    font-family: "lato-regular", Helvetica, Arial, sans-serif;
	    font-size: 14px;
	    margin: -15px 0 0 25px;
	    left: 1px;
	}



	.review{
	    /* width: 100%; */
	    /* height: 100px; */
	    /* background: #bfd9f2; */
	    /* position: relative; */
	}

	.review #review{
	    /* display: block; */
	    width: 800px;
	    height: 100px;
	    /* float: left; */
	    border: 10;
	    /* outline: none; */
	    /* margin: 10px; */
	    padding: 10px;
	    /* background: #bfd9f2; */
	    /* color: #ffffff; */
	    font-family: "lato-regular", Helvetica, Arial, sans-serif;
	    font-size: 15px;
	    /* text-transform: uppercase; */
	    letter-spacing: 1px;
	    /* line-height: 22px; */
	}

/*
	*{
    margin: 0;
    padding: 0;
	} */
	.rate {
			display: inline-block;
			vertical-align: top;
	    height: 46px;
	    padding: 10px 0px 20px 0px;
	}
	.rate:not(:checked) > input {
	    position:absolute;
	    top:-9999px;
	}
	.rate:not(:checked) > label {
	    float:right;
	    width:1em;
	    overflow:hidden;
	    white-space:nowrap;
	    cursor:pointer;
	    font-size:30px;
	    color:#ccc;
	}
	.rate:not(:checked) > label:before {
	    content: '★ ';
	}
	.rate > input:checked ~ label {
	    color: #ff5a60;
	}
	.rate:not(:checked) > label:hover,
	.rate:not(:checked) > label:hover ~ label {
	    color: #ff5a60;
	}
	.rate > input:checked + label:hover,
	.rate > input:checked + label:hover ~ label,
	.rate > input:checked ~ label:hover,
	.rate > input:checked ~ label:hover ~ label,
	.rate > label:hover ~ input:checked ~ label {
	    color: #ff5a60;
	}


	img.rate_hotel{
	    width: 80%;
	    height: auto!important;
	    vertical-align: top;
	}

  </style>
</head>
<body>


	<section class="newhero">
		<header>
			<div class="wrapper">
				<a href="#"><img src="img/letter-s.png" height="50px" width="50px" class="logo" alt="" title=""/></a>
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
						<li><a href="login.php">Login</a></li>
						<li><a href="login.php">Sign Up</a></li>
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
			<h2>Rate & Review</h2>
			<a href="#">
				<img src="img/<?php echo $row['pic_link'] ?>" alt="" title="" class="rate_hotel"/>
			</a>
			<h3>Marinabay Sand</h3>
			<h3> <?php echo $row['check_in'] ?> </br>to </br><?php echo $row['check_out'] ?></h3>
		</div>
		<!-- right column is comment section -->
		<form action="submit_rate.php" method="post">
			<input type = "text" value = "<?php echo $booking_id ?>" name = "booking_id" hidden/>
			<input type = "text" value = "<?php echo $row['hotelname'] ?>" name = "hotel" hidden/>
			<div id="rightcolumn">
				<section class="review">
					<h2>Describe your experience</h2>
					<textarea name="ReviewContent" id="review" cols="40" rows="5" placeholder="" autocomplete="off"></textarea>
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

</body>
</html>

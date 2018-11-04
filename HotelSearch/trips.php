<?php
session_start();
include "dbconnect.php";
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
	      height: 400px;
	      position: relative;
	      background: url('img/night_hotel.jpg') no-repeat bottom center;
	      /* background-color:  #95badf; */
	      background-size: cover;
	      -webkit-background-size: cover;
	      -moz-background-size: cover;
	      -o-background-size: cover;
	  }

	  .newhero .caption{
	    /* width: 1100px;
	    margin: 0 auto;
	    position: relative; */
	      width: 100%;
	      position: absolute;
	      text-align: center;
	      top: 40%;
	      /* margin-top: -105px; */
	      z-index: 10;
	  }

	  .newhero .caption h2{
	      color: #fff;
	      font-family: "p22_corinthia", Helvetica, Arial, sans-serif;
	      /* font-family: "lato-regular", Helvetica, Arial, sans-serif; */
	      font-size: 100px;
	      font-weight: lighter;
	      margin: 20px;
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


  /*  listings section  */
  .newlistings{
      padding: 50px 0 100px 0;
  }

  .newlistings ul.trips_list{
      list-style: none;
      overflow: hidden;
  }

  .newlistings ul.trips_list li{
      display: block;
      width: 300px;
      height: auto;
      position: relative;
      float: left;
      margin: 0 40px 40px 0;
  }

  .newlistings ul.trips_list li img.property_img{
      width: 100%;
      height: auto!important;
      vertical-align: top;
  }


  .newlistings ul.trips_list li .price{
      position: absolute;
      top: 10px;
      left: 10px;
      padding: 15px 20px;
      background: #ffffff;
      color: #514d4d;
      font-family: "lato-bold", Helvetica, Arial, sans-serif;
      font-size: 16px;
      font-weight: bold;
      letter-spacing: 1px;

      border-radius: 2px;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      -o-border-radius: 2px;
  }


  .newlistings ul.trips_list li:nth-child(3n+0){
      margin-right: 0;
  }

  .newlistings ul li .trip_details{
      width: 258px;
      padding: 10px 20px 14px 20px;
      border-bottom: 1px solid #f2f1f1;
      border-left: 1px solid #f2f1f1;
      border-right: 1px solid #f2f1f1;

      transition: all .2s linear;
      -webkit-transition: all .2s linear;
      -moz-transition: all .2s linear;
      -o-transition: all .2s linear;
  }

  .newlistings ul li:hover .trip_details{
      border-bottom: 1px solid #95badf;
      border-left: 1px solid #95badf;
      border-right: 1px solid #95badf;
  }

  .newlistings ul li .trip_details h1{
      color: #666464;
      font-family: "lato-bold", Helvetica, Arial, sans-serif;
      font-size: 16px!important;
      font-weight: bold;
      margin-bottom: 5px;
      line-height: 28px;
  }

  .newlistings ul li .trip_details h1 a{
      text-decoration: none;
      color: #666464;
  }

  .newlistings ul li .trip_details h2{
      color: #9d9d9d;
      font-family: "lato-regular", Helvetica, Arial, sans-serif;
      font-size: 12px;
      line-height: 26px;
  }

  .newlistings ul li .trip_details .property_size{
      color: #676767;
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

		<section class="caption">
      <h2 class="caption">Trips</h2>
      <h3 class="properties">Here are your adventures.</h3>

    </section>


	</section><!--  end hero section  -->

  <section class="newlistings">
    <div class="wrapper">
			<?php
			if(isset($_SESSION["operation"]))
			{
				if($_SESSION["operation"] == "book")
				{
					?>
					<h2> New Booking Confirmed!!</h2>
					<?php
				}
				if($_SESSION["operation"] == "cancel")
				{
					?>
					<h2> Booking Has Been Cancelled.</h2>
					<?php
				}
				if($_SESSION["operation"] == "rate")
				{
					?>
					<h2> Thanks For Rating!!</h2>
					<?php
				}
				unset($_SESSION["operation"]);
			}
			 ?>
			 <div class="card">
				 <div class="content">
					<h2>Upcoming Trips</h2>

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

		      <h2>Past Trips</h2>
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
			              <a href="rate.php?booking_id=<?php echo $row['id']; ?>"><h3>Go to Rate</h3></a>
									<?php } else echo "<h3>Rated</h3>"?>
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
</html>

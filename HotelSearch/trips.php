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
      width: 340px;
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
      width: 298px;
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

  .newlistings .more_listing{
      display: block;
      width: 100%;
      text-align: center;
      margin: 84px 0 22px 0;
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
						<li><a href="#">Rate</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Login</a></li>
						<li><a href="#">Sign Up</a></li>
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
      <h2>Upcoming Trips</h2>

      <ul class="trips_list">
        <li>
          <a href="rate.php">
            <img src="img/Marinabay.jpg" alt="" title="" class="property_img"/>
          </a>
          <div class="trip_details">
            <h1>
              <a href="#">Bencoolen Hotel</a>
            </h1>
            <h1>
              Jul 01-08, 2020 | 4 guests
            </h1>
            <h1>
              <a href="rate.php">Go to Rate</a>
            </h1>
          </div>
        </li>


      </ul>

      <h2>Past Trips</h2>
      <ul class="trips_list">
        <li>
          <a href="rate.php">
            <img src="img/Marinabay.jpg" alt="" title="" class="property_img"/>
          </a>
          <div class="trip_details">
						<h1>
							<a href="#">Bencoolen Hotel</a>
						</h1>
            <h1>
              Jul 01-08, 2020 | 4 guests
            </h1>
            <h1>
              <a href="rate.php">Go to Rate</a>
            </h1>
					</div>
        </li>

        <li>
          <a href="rate.php">
            <img src="img/Marinabay.jpg" alt="" title="" class="property_img"/>
          </a>
          <div class="trip_details">
						<h1>
							<a href="#">Bencoolen Hotel</a>
						</h1>
            <h1>
              Jul 01-08, 2020 | 4 guests
            </h1>
            <h1>
              <a href="rate.php">Go to Rate</a>
            </h1>
					</div>
        </li>

        <li>
          <a href="rate.php">
            <img src="img/Marinabay.jpg" alt="" title="" class="property_img"/>
          </a>
          <div class="trip_details">
						<h1>
							<a href="#">Bencoolen Hotel</a>
						</h1>
            <h1>
              Jul 01-08, 2020 | 4 guests
            </h1>
            <h1>
              <a href="rate.php">Go to Rate</a>
            </h1>
					</div>
        </li>


        <li>
          <a href="rate.php">
            <img src="img/Marinabay.jpg" alt="" title="" class="property_img"/>
          </a>
          <div class="trip_details">
						<h1>
							<a href="#">Bencoolen Hotel</a>
						</h1>
            <h1>
              Jul 01-08, 2020 | 4 guests
            </h1>
            <h1>
              <a href="rate.php">Go to Rate</a>
            </h1>
					</div>
        </li>

      </ul>
    </div>
  </section>
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

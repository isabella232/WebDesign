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

  /*  Hero Section  */

  .contacthero{
      width: 100%;
      height: 400px;
      position: relative;
      background: url('img/laptop_dark_blur.jpg') no-repeat bottom center;
      /* background-color:  #95badf; */
      background-size: cover;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
  }

  .contacthero .caption{
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

  .contacthero .caption h2{
      color: #fff;
      font-family: "p22_corinthia", Helvetica, Arial, sans-serif;
      /* font-family: "lato-regular", Helvetica, Arial, sans-serif; */
      font-size: 100px;
      font-weight: lighter;
      margin: 20px;
      position: relative;
      display: block;
  }

  .contacthero .caption h3{
      color: #fff;
      font-family: "lato-regular", Helvetica, Arial, sans-serif;
      font-size: 14px;
      margin: -15px 0 0 25px;
      left: 1px;
  }



  i {
      border: solid white;
      border-width: 0 10px 10px 0;
      display: inline-block;
      padding: 15px;
      margin: 200px 0 0 0;
  }

  .down {
      transform: rotate(45deg);
      -webkit-transform: rotate(45deg);
  }

  button,
  button::after {
    -webkit-transition: all 0.3s;
  	-moz-transition: all 0.3s;
    -o-transition: all 0.3s;
  	transition: all 0.3s;
  }

  button {
    background: none;
    border: 3px solid #000;
    border-radius: 5px;
    color: #000;
    /* display: block; */
    display: inline-block;
    font-size: 15px;
    font-weight: bold;
    margin:100px auto;
    padding: 20px 80px;
    position: relative;
    text-transform: uppercase;
  }

  button::before,
  button::after {
    background: #000;
    content: '';
    position: absolute;
    z-index: -1;
  }

  button:hover {
    color: #95badf;
  }

  /* BUTTON 1 */
  .btn::after {
    height: 0;
    left: 0;
    top: 0;
    width: 100%;
  }

  .btn:hover:after {
    height: 100%;
  }

  .details h1{
    color: #000000;
    margin:50px 0;
  }
  .details p{
    color: #626262;
    font-family: "lato-regular", Helvetica, Arial, sans-serif;
    letter-spacing: 1px;
    line-height: 20px;
    margin:50px 0;
  }

  </style>
</head>
<body>


	<section class="contacthero">
		<header>
			<div class="wrapper">
				<a href="#"><img src="" height="50px" width="50px" class="logo" alt="" title=""/></a>
				<a href="#" class="hamburger"></a>
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
      <h2 class="caption">Help</h2>
      <h3 class="properties">Questions? You’re in the right place.</h3>

    </section>


	</section><!--  end hero section  -->

	<div class="wrapper" >
    <!-- <input type="button" value="Getting Started"></input>
    <input type="button" value="Booking"></input>
    <input type="button" value="Payment"></input>
    <input type="button" value="Your trips"></input> -->
    <a href="#started"><button class="btn">Getting Started</button></a>
    <a href="#booking"><button class="btn">Booking</button></a>
    <a href="#payment"><button class="btn">Payment</button></a>
    <a href="#trip"><button class="btn">Your trips</button></a>
    <div class="details">
      <div id="started">
        <h1> Getting Started</h1>
        <p>Airbnb is, at its core, an open community dedicated to bringing the world closer together by fostering meaningful, shared experiences amongst people from all parts of the world. Our community includes millions of people from virtually every country on the globe. It is an incredibly diverse community, drawing together individuals of different cultures, values, and norms.

            The Airbnb community is committed to building a world where people from every background feel welcome and respected, no matter how far they have travelled from home. This commitment rests on two foundational principles that apply both to Airbnb’s hosts and guests: inclusion and respect. Our shared commitment to these principles enables every member of our community to feel welcome on the Airbnb platform no matter who they are, where they come from, how they worship, or whom they love. Airbnb recognises that some jurisdictions permit, or require, distinctions amongst individuals based on factors such as national origin, gender, marital status or sexual orientation, and it does not require hosts to violate local laws or take actions that may subject them to legal liability. Airbnb will provide additional guidance and adjust this nondiscrimination policy to reflect such permissions and requirements in the jurisdictions where they exist.
      </p>
      </div>
      <div id="booking">
        <h1> Booking</h1>
        <p>Airbnb is, at its core, an open community dedicated to bringing the world closer together by fostering meaningful, shared experiences amongst people from all parts of the world. Our community includes millions of people from virtually every country on the globe. It is an incredibly diverse community, drawing together individuals of different cultures, values, and norms.

            The Airbnb community is committed to building a world where people from every background feel welcome and respected, no matter how far they have travelled from home. This commitment rests on two foundational principles that apply both to Airbnb’s hosts and guests: inclusion and respect. Our shared commitment to these principles enables every member of our community to feel welcome on the Airbnb platform no matter who they are, where they come from, how they worship, or whom they love. Airbnb recognises that some jurisdictions permit, or require, distinctions amongst individuals based on factors such as national origin, gender, marital status or sexual orientation, and it does not require hosts to violate local laws or take actions that may subject them to legal liability. Airbnb will provide additional guidance and adjust this nondiscrimination policy to reflect such permissions and requirements in the jurisdictions where they exist.
      </p>
      </div>
      <div id="payment">
        <h1> Payment</h1>
        <p>Airbnb is, at its core, an open community dedicated to bringing the world closer together by fostering meaningful, shared experiences amongst people from all parts of the world. Our community includes millions of people from virtually every country on the globe. It is an incredibly diverse community, drawing together individuals of different cultures, values, and norms.

            The Airbnb community is committed to building a world where people from every background feel welcome and respected, no matter how far they have travelled from home. This commitment rests on two foundational principles that apply both to Airbnb’s hosts and guests: inclusion and respect. Our shared commitment to these principles enables every member of our community to feel welcome on the Airbnb platform no matter who they are, where they come from, how they worship, or whom they love. Airbnb recognises that some jurisdictions permit, or require, distinctions amongst individuals based on factors such as national origin, gender, marital status or sexual orientation, and it does not require hosts to violate local laws or take actions that may subject them to legal liability. Airbnb will provide additional guidance and adjust this nondiscrimination policy to reflect such permissions and requirements in the jurisdictions where they exist.
      </p>
      </div>
      <div id="trip">
        <h1> Your Trips</h1>
        <p>Airbnb is, at its core, an open community dedicated to bringing the world closer together by fostering meaningful, shared experiences amongst people from all parts of the world. Our community includes millions of people from virtually every country on the globe. It is an incredibly diverse community, drawing together individuals of different cultures, values, and norms.

            The Airbnb community is committed to building a world where people from every background feel welcome and respected, no matter how far they have travelled from home. This commitment rests on two foundational principles that apply both to Airbnb’s hosts and guests: inclusion and respect. Our shared commitment to these principles enables every member of our community to feel welcome on the Airbnb platform no matter who they are, where they come from, how they worship, or whom they love. Airbnb recognises that some jurisdictions permit, or require, distinctions amongst individuals based on factors such as national origin, gender, marital status or sexual orientation, and it does not require hosts to violate local laws or take actions that may subject them to legal liability. Airbnb will provide additional guidance and adjust this nondiscrimination policy to reflect such permissions and requirements in the jurisdictions where they exist.
      </p>
      </div>
    </div>
	</div>

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

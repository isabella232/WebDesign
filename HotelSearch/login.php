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
  <script type="text/javascript" src="js/login.js"></script>
  <style>

  /*  Hero Section  */

  .contacthero{
      width: 100%;
      height: 900px;
      position: relative;
      background: url('img/blue_hotel.jpg') no-repeat bottom center;
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


  a {
    text-decoration: none;
    color: #1ab188;
    transition: 0.5s ease;
  }
  a:hover {
    color: #179b77;
  }
  .form {
    background: rgba(19, 35, 47, .9);
    padding: 40px;
    max-width: 600px;
    margin: 40px auto;
    border-radius: 4px;
    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, .3);
  }
  .tab-group {
    list-style: none;
    padding: 0;
    margin: 0 0 40px 0;
  }
  .tab-group:after {
    content: "";
    display: table;
    clear: both;
  }
  .tab-group li a {
    display: block;
    text-decoration: none;
    padding: 15px;
    background: rgba(160, 179, 176, .25);
    color: #a0b3b0;
    font-size: 20px;
    float: left;
    width: 45%;
    text-align: center;
    cursor: pointer;
    transition: 0.5s ease;
  }
  .tab-group li a:hover {
    /* background: #179b77; */
    background: #95badf;
    color: #fff;
  }
  .tab-group li a.active{
    /* background: #1ab188; */
    background: #95badf;
    color: #fff;
  }
  .tab-content > div:last-child {
    display: none;
  }
  h1 {
    text-align: center;
    color: #fff;
    font-weight: 300;
    margin: 0 0 40px;
  }
  label {
    position: absolute;
    transform: translateY(6px);
    left: 13px;
    color: rgba(255, 255, 255, .5);
    transition: all 0.25s ease;
    -webkit-backface-visibility: hidden;
    pointer-events: none;
    font-size: 22px;
  }
  label .req {
    margin: 2px;
    color: #1ab188;
  }
  label.active {
    transform: translateY(50px);
    left: 2px;
    font-size: 14px;
  }
  label.active .req {
    opacity: 0;
  }
  label.highlight {
    color: #fff;
  }
  input, textarea {
    font-size: 22px;
    display: block;
    width: 100%;
    height: 100%;
    padding: 5px 10px;
    background: none;
    background-image: none;
    border: 1px solid #a0b3b0;
    color: #fff;
    border-radius: 0;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
  }
  input:focus, textarea:focus {
    outline: 0;
    border-color: #95badf;
  }
  textarea {
    border: 2px solid #a0b3b0;
    resize: vertical;
  }
  .field-wrap {
    position: relative;
    margin-bottom: 40px;
  }
  .top-row:after {
    content: "";
    display: table;
    clear: both;
  }
  .top-row > div {
    float: left;
    width: 48%;
    margin-right: 4%;
  }
  .top-row > div:last-child {
    margin: 0;
  }
  .button {
    border: 0;
    outline: none;
    border-radius: 0;
    padding: 15px 0;
    font-size: 2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    background: #95badf;
    color: #fff;
    transition: all 0.5s ease;
    -webkit-appearance: none;
  }
  .button:hover, .button:focus {
    background: #81add9;
  }
  .button-block {
    display: block;
    width: 100%;
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

<!--
    <section class="caption">
      <h2 class="caption">Help</h2>
      <h3 class="properties">Questions? You’re in the right place.</h3> -->

    <!-- </section> -->
    <div class="form">

        <ul class="tab-group">
          <li><a href="#" id="signup_button" onclick="openCity(event, 'signup');" class="tab active">Sign up</a></li>
          <li><a href="#" id="login button" onclick="openCity(event, 'login');"  class="tab"> Log in</a></li>
        </ul>
        <!-- <div class="tab-content"> -->
          <div id="signup" class="tab-content">
            <h1>Sign Up for Free</h1>

            <form action="/" method="post">

            <div class="top-row">
              <div class="field-wrap">
                <input type="text" placeholder="First Name*" required autocomplete="off" />
              </div>

              <div class="field-wrap">
                <input type="text" placeholder="Last Name*" required autocomplete="off"/>
              </div>
            </div>

            <div class="field-wrap">
              <input type="email" placeholder="Email Address*" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <input type="password" placeholder="Set A Password*" required autocomplete="off"/>
            </div>

            <button type="submit" class="button button-block"/>Get Started</button>

            </form>

          </div>

          <div id="login" class="tab-content">
            <h1>Welcome Back!</h1>

            <form action="/" method="post">

              <div class="field-wrap">
              <input type="email" required placeholder="Email Address*" autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <input type="password" placeholder="Password*" required autocomplete="off"/>
            </div>

            <button class="button button-block"/>Log In</button>

            </form>

          </div>
          <script>document.getElementById("signup_button").click();</script>

      </div> <!-- /form -->
	</section><!--  end hero section  -->

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

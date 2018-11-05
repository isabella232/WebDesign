<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hotel Search Portal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">

  <style>
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
  </style>
</head>
<body>

	<section class="help_page hero">
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
  					<li><a href="login.php?type=sign_up">Sign up</a></li>
  					<?php }
  					?>
  				</ul>
  			</nav>
  		</div>
	  </header><!--  end header section  -->
    <section class="caption">
      <h2 class="caption">Help</h2>
    </section>
	</section><!--  end hero section  -->


	<div class="wrapper" >
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
</body>
<footer>
  Copyright &copy; 2018 Hotel Search Portal
  <br>
  <a href="mailto:ren@jiawei.com">ren@jiawei.com</a> <a href="mailto:shaun@yong.com">shaun@yong.com</a>
</footer>
</html>

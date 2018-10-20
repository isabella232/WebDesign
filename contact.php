<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact us</title>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="index.css">
</head>
<body>
<div id="wrapper">
  <header>
    <!-- <h1>JavaJam Coffee House</h1> -->
    <img src="hotel.svg" height="50px" width="50px" >
    <nav>
    <ul>
      <li><a href="index.html">Book</a></li>
      <li><a href="rate.html">Rate</a></li>
      <li><a href="contact.html">Contact Us</a></li>
      <li><a href= "login">Login</a></li>
      <li><a href="signup.html">Sign Up</a></li>
	</ul>
      </nav>
  </header>

  <div id="rightcolumn">
    <div class="content">
      <h2>Welcome to the Hotel Search Portal</h2>
      <br>
<form action="singapore.html">
  <select onchange="this.form.submit()" id="country" name="country">
    <option value="singapore.html" >Singapore</option>
    <option value="malaysia.html">Malaysia</option>
    <option value="japan.html">Japan</option>
    <option value="korea.html">Korea</option>
    <input type="submit" value="Submit" >
  </select>
</form>

<div class="gallery">
  <a target="_blank" href="singapore.html">
    <img src="https://lonelyplanetwp.imgix.net/2014/10/resized-shutterstock_593894891-e364f2ce23b9.jpg?fit=min&q=40&sharp=10&vib=20&w=1470" alt="5Terre" width="600" height="400">
  </a>
  <div class="desc">Singapore</div>
</div>
<div class="gallery">
  <a target="_blank" href="img_forest.jpg">
    <img src="https://t-ec.bstatic.com/xdata/images/city/540x270/349258.jpg" alt="Forest" width="600" height="400">
  </a>
  <div class="desc">Malaysia</div>
</div>

<div class="gallery">
  <a target="_blank" href="img_lights.jpg">
    <img src="https://brightcove04pmdo-a.akamaihd.net/5104226627001/5104226627001_5575839228001_5541832440001-vs.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">Japan</div>
</div>

<div class="gallery">
  <a target="_blank" href="img_mountains.jpg">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6jmOvI8lbDllrwJCmfO0BNNXU54C2eoL5vAFAneXe8_4oJiJv" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc">Korea</div>
</div>
</div>


     <!--
      <ul>
          <li>Specialty Coffee and Tea</li>
          <li>Bagels, Muffins, and Organic Snacks</li>
          <li>Music and Poetry Readings</li>
          <li>Open Mic Night Every Friday</li>
        </ul>
-->

    <!-- <h2>Panoramic View</h2> -->
	<!-- <p>Take in some scenery! The top of our lighthouse offers a panoramic view of the countryside. Challenge your friends to climb our 100-stair tower.</p> -->
    </div>
    <script>
function submit_country() {
    var submit = document.getElementsByClassName('submit');
    if (submit.click()){
        url = submit.val();
        window.open(url);
    }
}



    </script>
    <br><br>
    <footer>Copyright &copy; 2018 Hotel Search Portal
    <br>
    <a href="mailto:shaunyong9@gmail.com">shaunyong9@gmail.com</a>
    <a href="mailto:renjiawei1997@gmail.com">shaunyong9@gmail.com</a>
    </footer>
  </div>

</body>
</html>

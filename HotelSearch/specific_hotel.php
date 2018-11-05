<?php
include "dbconnect.php";
session_start();
if(!isset($_SESSION['check_in_date']) || empty($_SESSION['check_in_date']))
{
    $_SESSION['check_in_date'] = new DateTime('today');
    $_SESSION['check_in_date'] =$_SESSION['check_in_date']->format('Y/m/d');
}

if(!isset($_SESSION["check_out_date"]) || empty($_SESSION["check_out_date"]))
{
    $_SESSION['check_out_date'] = new DateTime('tomorrow');
    $_SESSION['check_out_date'] =$_SESSION['check_out_date']->format('Y/m/d');
}

if(!isset($_SESSION['people_count']))
  $_SESSION['people_count'] = 2;

$check_in_date = $_SESSION['check_in_date'];
$check_out_date = $_SESSION['check_out_date'];
$people_count = $_SESSION['people_count'];
$period = (int)date_diff(date_create($check_in_date), date_create($check_out_date))->format("%R%a");
$specific_hotel = $_GET['hotel_name'];
$today = new DateTime('today');
$today = $today->format('Y-m-d');
$tomorrow = new DateTime('tomorrow');
$tomorrow =$tomorrow->format('Y-m-d');

$result = mysqli_query($dbcnx,"SELECT * FROM hotel_search WHERE hotelname  LIKE '%$specific_hotel%'");
$hotel_info = $result->fetch_assoc();
$default_single = $people_count%2;
$default_double = floor($people_count/2);

$rooms = mysqli_query($dbcnx,"SELECT * FROM rooms WHERE hotel LIKE '%$specific_hotel%'");
$single_availability = 0;
$double_availability = 0;
while($room_info = $rooms->fetch_assoc())
{
			$availability = $room_info['availability'];
			$query = "SELECT * FROM trips WHERE hotel LIKE '%$specific_hotel%' AND NOT (check_out < '$check_in_date' OR check_in >'$check_out_date')";
			$clashes = mysqli_query($dbcnx,$query);
			while($clash = $clashes->fetch_assoc())
			{
				if($room_info['room_type']=="Single")
					$availability -= $clash["single_cnt"];
				if($room_info['room_type']=="Double")
					$availability -= $clash["double_cnt"];
			}
			if($availability < 0) $availability=0; //for test cases
			if($room_info['room_type']=="Single")
			{
				$single_availability = $availability;
				$single_price = $room_info['price'];
			}
			if($room_info['room_type']=="Double")
			{
				$double_availability = $availability;
				$double_price = $room_info['price'];
			}
}
if($double_availability < $default_double)
	{$default_double = $double_availability; $default_single = $people_count - 2*$default_double;}
if($single_availability < $default_single)
	{$default_single = $single_availability; $default_double =ceil(($people_count - $single_availability)/2);}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hotel Search Portal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
  <script type="text/javascript" src="js/main.js"></script>
  <style>
	#leftcolumn {
		float: left;
    width: 40%;
		padding-top: 50px;
		padding-bottom: 60px;
	}
	#rightcolumn {
		float: left;
    width: 60%;
		padding-top: 50px;
		padding-bottom: 60px;
	}
  </style>
</head>
<body>


	<section class="short_color hero">
		<header>
			<div class="wrapper">
				<a href="index.php"><img src="img/letter-s.png" class="logo" alt="" title=""/></a>
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
	</section><!--  end hero section  -->


  <section class="search">
    <div class="advanced_search">
			<div class="wrapper">
				<form action="low_level_search.php" method="post">
					<div class="search_fields">
						<input class="float" type="text" id="keywords" pattern="^[a-zA-Z0-9 ]*$" title="Only letters and numbers" name="location" value="<?php echo $specific_hotel; ?>"  autocomplete="off">
						<hr class="field_sep float"/>
						<select class="float" name="people_count" id="count">
							<?php
							for($i=0;$i<=10;$i++)
							{
                if($i == $people_count)
					        echo "<option selected value=".$i.">".$i."</option>";
                else
                  echo "<option value=".$i.">".$i."</option>";
							}
							 ?>
						</select>
						<hr class="field_sep float"/>
						<input type="submit"  id ="submit_search" class = "float" name="submit_search" value="Search &#8594;"/>
					</div>
					<input name="check_in_date" value="<?php echo $check_in_date; ?>" type="text" class="float" min="<?php echo $today; ?>" id="check_in_date" onfocus="(this.type='date')" onblur="(this.type='text')" onchange="update_check_out_min();" autocomplete="off" >
					<hr class="field_sep float"/>
					<input name="check_out_date" value="<?php echo $check_out_date; ?>" type="text" class="float" min="<?php echo $tomorrow; ?>"  id="check_out_date" onfocus="(this.type='date')" onblur="(this.type='text')" autocomplete="off" >
				</form>
			</div>
		</div>
	</section>

   <div class="wrapper" id="main_body">
			<!-- left column shows user's recent stay -->
	  <div id="leftcolumn">
			<div class="card">
				<div class="content">
					<h2><?php echo $hotel_info['hotelname'];  ?></h2>
					<img src="<?php echo "img/".$hotel_info['pic_link'];  ?> " alt="" title="" class="rate_hotel"/>
					<h4><?php echo $hotel_info['address']; ?></h4>
					<h4><?php echo $check_in_date ?> | <?php echo $check_out_date ?></h4>
				</div>
			</div>


			<div class="card">
				<div class="content">
					 <form action="confirm_booking.php" method="post">
						 <table>
							 <tr>
								 <th >Room</th>
								 <th >Price</th>
								 <th >Select</th>
							 </tr>
							 <?php
							 $result = mysqli_query($dbcnx,"SELECT * FROM rooms WHERE hotel LIKE '%$specific_hotel%'");
							 while($room_info = $result->fetch_assoc())
							 {
							 ?>
							 <tr>
								 <td><?php echo $room_info['room_type']; ?> Room</td>
								 <td>$<?php echo $room_info['price']; ?></td>
								 <input type="text" id="<?php echo $room_info['room_type']; ?>_price" name="<?php echo $room_info['room_type']; ?>_price" value ='<?php echo $room_info['price']; ?>' hidden>
								 <td>
									 <div class="select">
										 <select id='<?php echo $room_info['room_type']; ?>_selection' name='<?php echo $room_info['room_type']; ?>' onchange="update_total_price();">
											 <?php
											 $availability = $room_info['availability'];
											 $query = "SELECT * FROM trips WHERE hotel LIKE '%$specific_hotel%' AND NOT (check_out < '$check_in_date' OR check_in >'$check_out_date')";
											 $clashes = mysqli_query($dbcnx,$query);
											 while($clash = $clashes->fetch_assoc())
											 {
												 if($room_info['room_type']=="Single")
													 $availability -= $clash["single_cnt"];
												 if($room_info['room_type']=="Double")
													 $availability -= $clash["double_cnt"];
											 }
											 if($availability < 0) $availability=0; //for test cases
											 for($i=0;$i<=$availability;$i++)
											 {
												 if($room_info['room_type']=="Single" && $i == $default_single)
												 {
														 echo "<option selected value=".$i.">".$i."</option>";
														 continue;
												 }
												 if($room_info['room_type']=="Double" && $i == $default_double)
												 {
														 echo "<option selected value=".$i.">".$i."</option>";
														 continue;
												 }
												 echo "<option value=".$i.">".$i."</option>";
											 }
												?>
										 </select>
									 </div>
								 </td>
							 </tr>
							 <?php
							 }
								?>
						 </table>
							<input type="text" name="period" id="period" value ='<?php echo $period ?>' hidden>
							<input type="text" id="total_price" name ="total_price" value="0" hidden/>
							<input type="text" id="total_price_show" value="0" class="float" onfocus="this.blur();"/>
						 <script>update_total_price();</script>
						 <button type="submit" id="reserve" class = "button">BOOK</button>

						 <input type="text" name="hotel" value ='<?php echo $specific_hotel ?>' hidden>
						 <input type="text" name="user" value ='<?php echo $_SESSION['valid_user'] ?>' hidden>
						 <input type="text" name="check_in_date" value ='<?php echo $check_in_date ?>' hidden>
						 <input type="text" name="check_out_date" value ='<?php echo $check_out_date ?>' hidden>
						 <input type="text" name="people_count" value ='<?php echo $people_count ?>' hidden>
					 </form>
				 </div>
			 </div>
		</div>
  <!-- right column is comment section -->
   <div id="rightcolumn">
	 <div class="card">
		 <div class="content">
			 <h2>Highlights</h2>
			 <h4>	<?php echo $hotel_info['detail']; ?></h4>
			 <hr>
			 <h2>Facilities<h2>
			 <h4><b>Breakfast: </b>	<?php echo $hotel_info['breakfast'] ; ?></h4>
			 <h4><b>Parking: </b> <?php echo $hotel_info['parking'] ; ?></h4>
			 <hr>
				<h2 style="text-align:left;float:left;"><?php echo $hotel_info['number_of_review'] ?> Reviews</h2>
				<?php if($hotel_info['number_of_review']!=0){ ?>
				<h1 style="text-align:right;float:right;color:#ff5a60"><?php echo number_format($hotel_info['review_score'], 1, '.', ''); ?></h1>
			  <?php } ?>
				<hr style="clear:both;">
				<?php
				$query = "SELECT * FROM reviews LEFT JOIN trips ON reviews.booking_id= trips.id WHERE hotel  LIKE '%$specific_hotel%'";
				$result = mysqli_query($dbcnx,$query);
				while($review = $result->fetch_assoc())
				{
				?>
					<h3><?php echo $review['username']; ?></h3>
					<h5>Stayed in <?php echo substr($review['check_in'], 0, 7); ?></h5>
					<h4>
						Cleanliness <span class="score"> <?php echo $review['cleanliness'] ?></span><span class="seperator">|</span>
						Comfort <span class ="score"><?php echo $review['comfort'] ?></span></span><span class="seperator">|</span>
						Location <span class = "score"><?php echo $review['location'] ?>
					</h4>
					<h4><?php echo $review['review']; ?></h4>
					<hr>
				<?php
				}
				 ?>
			</div>
		</div>
		</section>
	</div>
</div>
</body>
<footer>
  Copyright &copy; 2018 Hotel Search Portal
  <br>
  <a href="mailto:ren@jiawei.com">ren@jiawei.com</a> <a href="mailto:shaun@yong.com">shaun@yong.com</a>
</footer>
</html>

<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "dbconnect.php";
$today = new DateTime('today');
$today = $today->format('Y-m-d');
?>

<head>
	<title>Hotel Search Portal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<section class="long_background hero">
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

			<section class="caption">
				<h2 class="caption">Find Your Dream Hotel</h2>
			</section>
	</section><!--  end hero section  -->

	<section class="search">
    <div class="advanced_search">
			<div class="wrapper">
				<form action="low_level_search.php" method="post">
					<div class="search_fields">
						<input class="float" type="text" id="keywords" name="location" pattern="^[a-zA-Z0-9 ]*$" title="Only letters and numbers" placeholder="Where are you going?"  autocomplete="off" required>
						<hr class="field_sep float"/>
						<select class="float" name="people_count" id="count">
							<option value="" disabled selected>Guests</option>
							<?php
							for($i=1;$i<=10;$i++)
							{
								echo "<option value=".$i.">".$i."</option>";
							}
							 ?>
						</select>
						<hr class="field_sep float"/>
						<input type="submit"  id ="submit_search" class = "float" name="submit_search" value="Search &#8594;"/>
					</div>
					<input name="check_in_date" placeholder="Check In Date" type="text" min="<?php echo $today; ?>" class="float" id="check_in_date" onfocus="(this.type='date')" onblur="(this.type='text')"	onchange="update_check_out_min();" autocomplete="off" >
					<hr class="field_sep float"/>
					<input name="check_out_date" placeholder="Check Out Date" type="text" class="float" id="check_out_date" onfocus="(this.type='date')" onblur="(this.type='text')" autocomplete="off" >
				</form>
			</div>
		</div>
	</section>


	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
        <!-- interate through hotels and show an brief view of each of them -->
        <?php
        $result = mysqli_query($dbcnx,"select * from hotel_search");
				$maximum_show = 3;
				for($i=0; $i<$maximum_show;$i++){
        	$row = $result->fetch_assoc();
          $hotelname = $row['hotelname'];
          $price = $row['price'];
          $pic_link = $row['pic_link'];
          $star = $row['star_ratings'];
         ?>
				<li>
					<a href="specific_hotel.php?hotel_name=<?php echo $hotelname ?>">
						<img src="img/<?php echo $pic_link ?>" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$<?php echo (int)$price ?></span>
					<div class="property_details">
						<h1>
							<form>
								<input type="hidden" name="hotel_name" value="<?php echo $hotelname ?>" />
								<a href="specific_hotel.php?hotel_name=<?php echo $hotelname ?>" onclick="this.form.submit();"><?php echo $hotelname ?></a>
              </form>
						</h1>
						<h2> <span class="property_size"><?php echo $star ?> stars</span></h2>
					</div>
				</li>
        <?php
          }
         ?>
			</ul>

			<ul class="properties_list" id="more">
				<!-- interate through hotels and show an brief view of each of them -->
				<?php
				while($row = $result->fetch_assoc()){
					$hotelname = $row['hotelname'];
					$price = $row['price'];
					$pic_link = $row['pic_link'];
					$star = $row['star_ratings'];
				 ?>
				<li>
					<a href="specific_hotel.php?hotel_name=<?php echo $hotelname ?>">
						<img src="img/<?php echo $pic_link ?>" alt="" title="" class="property_img"/>
					</a>
					<span class="price">$<?php echo (int)$price ?></span>
					<div class="property_details">
						<h1>
							<form>
								<input type="hidden" name="hotel_name" value="<?php echo $hotelname ?>" />
								<a href="specific_hotel.php?hotel_name=<?php echo $hotelname ?>" onclick="this.form.submit();"><?php echo $hotelname ?></a>
							</form>
						</h1>
						<h2> <span class="property_size"><?php echo $star ?> stars</span></h2>
					</div>
				</li>
				<?php
					}
				 ?>
			</ul>
			<div class="more_listing">
				<a class="more_listing_btn" id="more_listing_btn" onclick="list_more()">View More Listings</a>
			</div>
		</div>
	</section>	<!--  end listing section  -->
</body>

<footer>
	Copyright &copy; 2018 Hotel Search Portal
	<br>
	<a href="mailto:ren@jiawei.com">ren@jiawei.com</a> <a href="mailto:shaun@yong.com">shaun@yong.com</a>
</footer>

</html>

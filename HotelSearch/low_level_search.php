<?php
include "dbconnect.php";
session_start();
if(isset($_POST['location']) && !empty($_POST['location']))
  $_SESSION['location'] = $_POST['location'];
if(isset($_POST['check_in_date']) && !empty($_POST['check_in_date']))
	$_SESSION['check_in_date'] = $_POST['check_in_date'];
else
{
    $_SESSION['check_in_date'] = new DateTime('today');
    $_SESSION['check_in_date'] =$_SESSION['check_in_date']->format('Y/m/d');
}

if(isset($_POST["check_out_date"]) && !empty($_POST["check_out_date"]))
	$_SESSION['check_out_date']= $_POST["check_out_date"];
else
{
    $_SESSION['check_out_date'] = new DateTime('tomorrow');
    $_SESSION['check_out_date'] =$_SESSION['check_out_date']->format('Y/m/d');
}

if(isset($_POST['people_count']))
	$_SESSION['people_count'] = $_POST['people_count'];
else
  $_SESSION['people_count'] = 2;

$location = $_SESSION['location'];
$check_in_date = $_SESSION['check_in_date'];
$check_out_date = $_SESSION['check_out_date'];
$people_count = $_SESSION['people_count'];
$default_single = $people_count%2;
$default_double = floor($people_count/2);
$period = (int)date_diff(date_create($check_in_date), date_create($check_out_date))->format("%R%a");
$today = new DateTime('today');
$today = $today->format('Y-m-d');

$high_level_query = "select * from hotel_search where (location like '%$location%' or hotelname like '%$location%')";
$low_level_query  ="";
if(isset($_POST["low_level_query"]) && !empty($_POST["low_level_query"]))
  $low_level_query= $_POST["low_level_query"];

$query = $high_level_query.$low_level_query;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  	<title>Hotel Search Portal</title>
  	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/main.js"></script>
    <style>
  	#leftcolumn { float: left;
  		          width: 25%;
  							padding-top: 50px;
  							padding-bottom: 60px;
  	}
  	#rightcolumn { float: left;
      width: 75%;
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
						<input class="float" type="text" id="keywords" name="location" pattern="^[a-zA-Z0-9 ]*$" title="Only letters and numbers" value="<?php echo $location; ?>"  autocomplete="off">
						<hr class="field_sep float"/>
						<select class="float" name="people_count" id="count">
							<?php
							for($i=1;$i<=10;$i++)
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
					<input name="check_in_date" value="<?php echo $check_in_date; ?>" min="<?php echo $today; ?>" type="text" class="float" id="check_in_date" onfocus="(this.type='date')" onblur="(this.type='text')" onchange="update_check_out_min();" autocomplete="off" >
					<hr class="field_sep float"/>
					<input name="check_out_date" value="<?php echo $check_out_date; ?>" type="text" class="float" id="check_out_date" onfocus="(this.type='date')" onblur="(this.type='text')" autocomplete="off" >
				</form>
			</div>
		</div>
	</section>

  	<div class="wrapper">
      <form action="low_level_search.php" method="post" id="low_level_query_form">
        <input type="text" id="low_level_query" name = "low_level_query" hidden/>
      </form>

  	  <div id="leftcolumn">
        <div class="card">
          <div class="content">
            <h2>Rank by:</h2>
            <hr style="margin:10px 0;">
            <div class="switch-field">
              <label class="sorting_radio"><input type = "radio" value=" order by price asc " name="sorting_radio" id= "radio1" onclick="send_low_level_query();"> Lowest Price First </input></label>
              <label class="sorting_radio"><input type = "radio" value=" order by star_ratings desc " name="sorting_radio" id= "radio2" onclick="send_low_level_query();"> Stars </input></label>
              <label class="sorting_radio"><input type = "radio" value=" order by review_score desc " name="sorting_radio" id= "radio3" onclick="send_low_level_query();"> Top Reviewed </input></label>
              <label class="sorting_radio"><input type="text" id="sorting" class="sorting" hidden/>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="content">
            <h2>Filter by:</h2>
            <hr style="margin:10px 0;">
            <h3>Price Range</h3>
            <label class="filter"><input type="checkbox" id = 'checkbox1' value="(price < 200)" onclick="send_low_level_query();" name='filter_checkbox'> $0 - $200 per night</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox2' value="(price >=200 and price <400)" onclick="send_low_level_query();" name='filter_checkbox'>$200 - $400 per night</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox3' value="(price >=400 and price <=600)" onclick="send_low_level_query();" name='filter_checkbox'>$400 - $600 per night</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox4' value="(price >=600 and price <800)" onclick="send_low_level_query();" name='filter_checkbox'>$600 - $800 per night</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox5' value="(price >=800)" onclick="send_low_level_query();" name='filter_checkbox'>$800+ per night</input></label>
            <h3>Star Rating</h3>
      	    <label class="filter"><input type="checkbox" id = 'checkbox6' value="(star_ratings = 1)" onclick="send_low_level_query();" name='filter_checkbox'>1 star</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox7' value="(star_ratings = 2)" onclick="send_low_level_query();" name='filter_checkbox'>2 star</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox8' value="(star_ratings = 3)" onclick="send_low_level_query();" name='filter_checkbox'>3 star</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox9' value="(star_ratings = 4)" onclick="send_low_level_query();" name='filter_checkbox'>4 star</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox10' value="(star_ratings = 5)" onclick="send_low_level_query();" name='filter_checkbox'>5 star</input></label>
            <h3>Review Score</h3>
            <label class="filter"><input type="checkbox" id = 'checkbox11' value="(review_score > 4.5)" onclick="send_low_level_query();" name='filter_checkbox'>Wonderful: 4.5+</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox12' value="(review_score > 4)" onclick="send_low_level_query();" name='filter_checkbox'>Very Good: 4.0+</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox13' value="(review_score > 3.5)" onclick="send_low_level_query();" name='filter_checkbox'>Good: 3.5+</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox14' value="(review_score > 3.0)" onclick="send_low_level_query();" name='filter_checkbox'>Pleasant 3.0+</input></label>
            <label class="filter"><input type="checkbox" id = 'checkbox15' value="(number_of_review = 0)" onclick="send_low_level_query();" name='filter_checkbox'>No rating</input></label>

            <input type="text" id="filter" name = "filter" hidden/>
          </div>
        </div>
  		</div>

      <div id="rightcolumn">
        <div class="card">
          <div class="content">
          <?php $result = mysqli_query($dbcnx,$query); ?>
          <h1><?php echo strtoupper($location); ?>: <?php echo $result->num_rows ?> properties found</h1>
          <section class="listings low_level">
              <ul class="properties_list">
                <!-- interate through hotels and show an brief view of each of them -->
                <?php
                while ($row = $result->fetch_assoc()) {
                  $hotelname = $row['hotelname'];
                  $price = $row['price'];
                  $pic_link = $row['pic_link'];
                  $star = $row['star_ratings'];
                  $detail = $row['detail'];
                  $review_score = $row['review_score'];
                  $number_of_review = $row['number_of_review'];
                 ?>
                <li>
                  <a href="specific_hotel.php?hotel_name=<?php echo $hotelname ?>">
                    <img src="img/<?php echo $pic_link ?>" alt="" title="" class="property_img"/>
                  </a>
                  <div class="property_details">
                    <h1>
                      <form>
                        <input type="hidden" id="hotel_name" name="hotel_name" value="<?php echo $hotelname ?>" />
                        <a href="specific_hotel.php?hotel_name=<?php echo $hotelname ?>" onclick="this.form.submit();"><?php echo $hotelname ?></a>
                      </form>
                    </h1>
                    <span class="price">$<?php echo (int)$price; ?></span>
                    <h2> <span class="property_size"><?php echo $star ?> stars</span></h2>
                    <h2> <span class="property_size"><b>
                      <?php if($number_of_review == 0) echo "No Review"; else echo "Review: ".number_format($review_score, 1, '.', '')."/5";?>
                    </b> </span></h2>
                    <hr>
                    <?php
                    $rooms = mysqli_query($dbcnx,"SELECT * FROM rooms WHERE hotel LIKE '%$hotelname%'");
                    $single_availability = 0;
                    $double_availability = 0;
                    $single_price =0;
                    $double_price =0;
                    $total_price = 0;
            				while($room_info = $rooms->fetch_assoc())
            				{
            							$availability = $room_info['availability'];
            							$query = "SELECT * FROM trips WHERE hotel LIKE '%$hotelname%' AND NOT (check_out < '$check_in_date' OR check_in >'$check_out_date')";
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
                    if($single_availability*1 + $double_availability*2 < $people_count){
                      ?>
                      <h1> <span class="property_size"> <span style="color:#ff5a60">SOLD OUT</span></span></h1>
                      <?php
                    }
                    else{
                      $estimated_single = $default_single;
                      $estimated_double = $default_double;
                      if($double_availability < $default_double){
                        $estimated_double = $double_availability;
                        $estimated_single = $people_count - $estimated_double*2;
                      }
                      if($single_availability < $default_single)
                      {
                        $estimated_single = $single_availability;
                        $estimated_double = ceil(($people_count - $single_availability)/2);
                      }
                      $total_price = $estimated_double*$double_price + $estimated_single*$single_price;
                      ?>
                      <h1> <span class="property_size">Estimated total: <span style="color:#ff5a60">$<?php echo $total_price ?> </span></span></h1>
                      <h2> <span class="property_size"> for <?php echo $people_count ?> guests <?php echo $period ?> night </span></h2>
                      <h2> <span class="property_size"> <?php echo $estimated_single ?> Single Room | <?php echo $estimated_double ?> Double Room </span></h2>
                      <?php
                    }
                    ?>
                  </div>
                </li>
              <?php } ?>
              </ul>
            </section>	<!--  end listing section  -->
          </div>
        </div>
     </div>

       <?php if(isset($_POST["low_level_query"])){?>
        <script> show_filter_checkbox();show_sorting(); </script>
      <?php } else{ ?>
         <script> reset_filter_checkbox();reset_sorting();</script>
       <?php } ?>
     </div>
   </body>
   <footer>
     Copyright &copy; 2018 Hotel Search Portal
     <br>
     <a href="mailto:ren@jiawei.com">ren@jiawei.com</a> <a href="mailto:shaun@yong.com">shaun@yong.com</a>
   </footer>
</html>

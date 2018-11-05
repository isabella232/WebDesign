//index.js
function list_more() {
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("more_listing_btn");

  if (moreText.style.display === "block") {
    btnText.innerHTML = "View More Listings";
    moreText.style.display = "none";
  } else {
    btnText.innerHTML = "View Less Listings";
    moreText.style.display = "block";
  }
}

function update_check_out_min()
{
  var check_in = document.getElementById('check_in_date');
  var check_out = document.getElementById('check_out_date');
  var check_in_date = check_in.value;
  var check_out_date = check_out.value;
  var check_out_min = new Date(check_in_date);
  check_out_min.setDate(check_out_min.getDate() + 1);
  new_min = formatDate(check_out_min);
  check_out.min = new_min;
  var check_out_date = new Date(check_out_date);
  if(check_out_date < check_out_min)
    check_out.value = new_min;
}


function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}
//login.js
function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tab");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function check_password()
{
  var password = document.getElementById('password').value;
  var password2 = document.getElementById('password2').value;
  if(password !== password2){
    document.getElementById('submit_button').disabled = true;
    document.getElementById('error_msg').innerHTML = "<h3 style='color:red;'>Password doesn't match</h3>";
  }
  else{
        document.getElementById('submit_button').disabled = false;
        document.getElementById('error_msg').innerHTML = "<h3 style='color:green;'>Password matches</h3>";
  }
}
//low_level_search.js
// use cookie to store checkbx states

//io
function setCookie(c_name,value,expiredays) {
      var exdate=new Date()
      exdate.setDate(exdate.getDate()+expiredays)
      document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate)
  }

function getCookie(c_name) {
    if (document.cookie.length>0) {
        c_start=document.cookie.indexOf(c_name + "=")
        if (c_start!=-1) {
            c_start=c_start + c_name.length+1
            c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) c_end=document.cookie.length
                return unescape(document.cookie.substring(c_start,c_end))
        }
  }
    return null
}

//implementation
function show_filter_checkbox()
{
  var filter_checkbox = document.getElementsByName('filter_checkbox');
  for(var i = 0; i < filter_checkbox.length; ++i)
  {
    if (getCookie(filter_checkbox[i].id) == "1")
    	filter_checkbox[i].checked = true;
    else
    	filter_checkbox[i].checked = false;
  }
}
function submit_filter_checkbox()
{
  var filter_checkbox = document.getElementsByName('filter_checkbox');
  for(var i = 0; i < filter_checkbox.length; ++i)
  {
      if(filter_checkbox[i].checked)
        setCookie(filter_checkbox[i].id, "1", 100)
      else
      	setCookie(filter_checkbox[i].id, "0", 100)
  }
}


function reset_filter_checkbox()
{
  var filter_checkbox = document.getElementsByName('filter_checkbox');
  for(var i = 0; i < filter_checkbox.length; ++i)
  {
      	filter_checkbox[i].checked = false;
  }
}


function show_sorting()
{
  var sorting_radios = document.getElementsByName('sorting_radio');
  for(var i = 0; i < sorting_radios.length; ++i)
  {
    if (getCookie(sorting_radios[i].id) == "1")
    	sorting_radios[i].checked = true;
    else
    	sorting_radios[i].checked = false;
  }
}
function submit_sorting()
{
  var sorting_radios = document.getElementsByName('sorting_radio');
  for(var i = 0; i < sorting_radios.length; ++i)
  {
      if(sorting_radios[i].checked)
        setCookie(sorting_radios[i].id, "1", 100)
      else
      	setCookie(sorting_radios[i].id, "0", 100)
  }
}

function reset_sorting()
{
  var sorting_radios = document.getElementsByName('sorting_radio');
  for(var i = 0; i < sorting_radios.length; ++i)
  {
      	sorting_radios[i].checked = false;
  }
}


function integrate_filter()
{
  var filter = document.getElementById('filter');
  filter.value = "";
  var price_range = "";
  var star_ratings = "";
  var review_score = "";
  for(var i = 1; i <= 5; ++i)
  {
      checkbox_id = "checkbox" + String(i);
      var filter_checkbox = document.getElementById(checkbox_id);
      if(filter_checkbox.checked)
        price_range += filter_checkbox.value + " or " ;
  }
  if(price_range != "")
  {
        price_range = "(" + price_range + " 0 " +")";
        filter.value += " and " + price_range;
  }

  for(var i = 6; i <= 10; ++i)
  {
      checkbox_id = "checkbox" + String(i);
      var filter_checkbox = document.getElementById(checkbox_id);
      if(filter_checkbox.checked)
        star_ratings += filter_checkbox.value + " or " ;
  }
  if(star_ratings != "")
  {
        star_ratings = "(" + star_ratings + " 0 " +")";
        filter.value += " and " + star_ratings;
  }

  for(var i = 11; i <= 15; ++i)
  {
      checkbox_id = "checkbox" + String(i);
      var filter_checkbox = document.getElementById(checkbox_id);
      if(filter_checkbox.checked)
        review_score += filter_checkbox.value + " or " ;
  }
  if(review_score != "")
  {
        review_score = "(" + review_score + " 0 " +")";
        filter.value += " and " + review_score;
  }

}

function integrate_sorting()
{
  var sorting = document.getElementById('sorting');
  sorting.value = "";
  for(var i = 1; i <= 3; ++i)
  {
      radio_id = "radio" + String(i);
      var sorting_radio = document.getElementById(radio_id);
      if(sorting_radio.checked)
        sorting.value = sorting_radio.value;
  }
}

function send_low_level_query()
{
  submit_filter_checkbox();
  submit_sorting();
  integrate_filter();
  integrate_sorting();
  var low_level_query = document.getElementById('low_level_query');
  var filter = document.getElementById('filter');
  var sorting = document.getElementById('sorting');

  low_level_query.value = filter.value + sorting.value;
  document.getElementById('low_level_query_form').submit();
}
//specific_hotel.js
function update_total_price()
{
  var single_number = document.getElementById("Single_selection").value;
  var doubele_number = document.getElementById("Double_selection").value;
  var single_price = document.getElementById("Single_price").value;
  var double_price = document.getElementById("Double_price").value;
  var price_per_night = single_number*single_price + double_price*doubele_number;
  var total_price = price_per_night*document.getElementById("period").value;
  document.getElementById("total_price").value = total_price;
  document.getElementById("total_price_show").value = "Total Price:  $"+total_price;
}

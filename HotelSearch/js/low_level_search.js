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

function reset_filter_checkbox()
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

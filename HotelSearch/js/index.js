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

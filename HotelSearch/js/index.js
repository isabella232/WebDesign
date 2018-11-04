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

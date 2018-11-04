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

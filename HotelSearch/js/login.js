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

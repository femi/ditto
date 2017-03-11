$( "#emailInput" ).keyup(function() {
  var elem = document.getElementById("emailInput");
  var button = document.getElementById("buttonSubmit");
  var email = elem.value;
  if (isValidEmailAddress(email)) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText === "false") {
          elem.className = "input is-medium is-success";
          button.className = "button is-primary"
        } else {
          elem.className = "input is-medium is-danger";
          button.className = "button is-primary is-disabled"
        }
      }
    }

    var querystring = "email=" + email;
    xmlhttp.open("POST", "/validate.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(querystring);
    xmlhttp.send(querystring);
} else {
    elem.className = "input is-medium is-danger";
    button.className = "button is-primary is-disabled"
}
});

$( "#usernameInput" ).keyup(function() {
  var elem = document.getElementById("usernameInput");
  var button = document.getElementById("buttonSubmit");
  var username = elem.value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText === "false") {
        elem.className = "input is-medium is-success";
        button.className = "button is-primary"
      } else {
        elem.className = "input is-medium is-danger";
        button.className = "button is-primary is-disabled"
      }
    }
  }

  var querystring = "username=" + username;
  xmlhttp.open("POST", "/validate.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  console.log(querystring);
  xmlhttp.send(querystring);

});

function isValidEmailAddress(emailAddress) {
  var pattern = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return pattern.test(emailAddress);
};

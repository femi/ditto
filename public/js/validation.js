$( "#emailInput" ).keyup(function() {
  var elem = document.getElementById("emailInput");
  // var button = document.getElementById("buttonSubmit");
  var email = elem.value;
  if (isValidEmailAddress(email)) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText === "false") {
          elem.className = "input is-medium is-success";
          // button.className = "button is-primary is-medium"
        } else {
          elem.className = "input is-medium is-danger animated shake";
          // button.className = "button is-primary is-medium is-disabled"
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
    // button.className = "button is-primary is-medium is-disabled";
}
});

$( "#usernameInput" ).keyup(function() {
  var elem = document.getElementById("usernameInput");
  // var button = document.getElementById("buttonSubmit");
  var username = elem.value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText === "false") {
        elem.className = "input is-medium is-success";
        // button.className = "button is-medium is-primary"
      } else {
        elem.className = "input is-medium is-danger";
        elem.className = "input is-medium is-danger animated shake";
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

$('#taginput').on('keyup keypress', function(e) {
  var keyCode = e.keyCode;
  if (keyCode === 32) {
      console.log("heloo");
      var value = $( "#taginput" ).val();
      $("#alltags").append(`<span class=\"tag is-primary\">${value}</span>`);
  }
});

$("#myselect").change(function() {
  var text = $('#myselect').find(":selected").text();
  $("#alltags").append(`<span id=\"tag_${text}\" class=\"tag is-info is-large\">${text}<button class=\"delete is-small\" onclick=\"removeInterest('tag_${text}')\" ></button></span>`);
  $(`#myselect option[value='${text}']`).remove();
  addInterest(text);
});


function removeInterest(tag) {
  console.log(tag);
  var elem = document.getElementById(tag);
  console.log(elem);
  elem.parentNode.removeChild(elem);


  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("request complete");
      console.log(this.responseText);
    }
  }

  var querystring = "deltag=" + tag.substr(4);
  xmlhttp.open("POST", "/validate.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  console.log(querystring);
  xmlhttp.send(querystring);
}


function addInterest(tag) {

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("request complete");
      console.log(this.responseText);
    }
  }

  var querystring = "tag=" + tag;
  xmlhttp.open("POST", "/validate.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  console.log(querystring);
  xmlhttp.send(querystring);
}
